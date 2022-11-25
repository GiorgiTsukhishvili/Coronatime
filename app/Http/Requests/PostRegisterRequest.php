<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username'              => ['required', 'unique:users,username', 'min:3'],
			'email'                 => ['required', 'email', 'unique:users,email', 'min:3'],
			'password'              => ['required', 'min:3', 'confirmed'],
			'password_confirmation' => ['required'],
		];
	}
}
