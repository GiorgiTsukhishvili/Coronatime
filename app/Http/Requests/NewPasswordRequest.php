<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
{
	public function rules()
	{
		return [
			'password'              => ['required', 'min:3', 'confirmed'],
			'password_confirmation' => ['required'],
		];
	}
}
