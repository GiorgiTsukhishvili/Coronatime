<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
	public function worldwide()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.worldwide');
	}

	public function byCountry()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.country');
	}
}
