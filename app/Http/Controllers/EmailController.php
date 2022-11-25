<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRegisterRequest;
use App\Models\User;
use App\Models\UserVerify;
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
}
