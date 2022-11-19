<?php

namespace App\Http\Controllers;

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
