<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

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

		if (auth()->attempt($request->only($login_type, 'password')))
		{
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

	public function reset()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('guest.password-reset');
	}
}
