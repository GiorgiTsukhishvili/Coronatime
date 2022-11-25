<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRegisterRequest;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
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

		return view('confirmation.email-sent');
	}

	public function verifyAccount()
	{
		if (is_null(request('token')))
		{
			abort(403);
		}

		$verifyUser = UserVerify::where('token', request('token'))->first();

		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		if (!is_null($verifyUser))
		{
			$user = $verifyUser->user;

			if (!$user->email_verified_at)
			{
				$user->markEmailAsVerified();
				$user->save();
			}
		}

		DB::table('users_verify')->where(['token' => request('token')])->delete();

		return view('confirmation.email-verified');
	}
}
