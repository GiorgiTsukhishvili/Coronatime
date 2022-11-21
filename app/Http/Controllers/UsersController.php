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

		function count($which)
		{
			return	CountriesData::sum($which);
		}

		return view('users.worldwide', [
			'deaths'   => count('deaths'),
			'recovers' => count('recovered'),
			'confirms' => count('confirmed'),
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
