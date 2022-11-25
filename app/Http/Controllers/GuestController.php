<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PostRegisterRequest;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
	public function index()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('guest.login');
	}

	public function login(LoginRequest $request)
	{
		$data = $request->validated();

		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		$login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$login_type => $request->input('login')]);

		$remember = request()->has('remember') ? true : false;

		if (auth()->attempt($request->only($login_type, 'password'), $remember))
		{
			if (auth()->user()->email_verified_at === null)
			{
				auth()->logout();
				return redirect(route('email-sent', ['lang' => app()->getLocale()]));
			}

			return redirect(route('worldwide', ['lang' => app()->getLocale()]));
		}

		return back()->withErrors(['login' => 'login.login-error'])->onlyInput('login');
	}

	public function register()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('guest.register');
	}

	public function postRegister(PostRegisterRequest $request)
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}
		$data = $request->validated();

		$data = $request->all();
		$data['password'] = bcrypt($data['password']);

		$createUser = User::create($data);

		$token = sha1($data['email']);

		UserVerify::create([
			'user_id' => $createUser->id,
			'token'   => $token,
		]);

		Mail::send('confirmation.email', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Email Verification Mail');
		});

		return redirect(route('email-sent', ['lang' => app()->getLocale()]));
	}

	public function reset()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('guest.password-reset');
	}

	public function confirmationSent()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('confirmation.email-sent');
	}
}
