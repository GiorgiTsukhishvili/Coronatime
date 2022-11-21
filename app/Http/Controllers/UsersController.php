<?php

namespace App\Http\Controllers;

use App\Models\CountriesData;

class UsersController extends Controller
{
	public function worldwide()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.worldwide', [
			'deaths'   => CountriesData::sum('deaths'),
			'recovers' => CountriesData::sum('recovered'),
			'confirms' => CountriesData::sum('confirmed'),
		]);
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
