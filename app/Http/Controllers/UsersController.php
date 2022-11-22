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

		return view('users.country', [
			'deaths'    => CountriesData::sum('deaths'),
			'recovers'  => CountriesData::sum('recovered'),
			'confirms'  => CountriesData::sum('confirmed'),
			'countries' => CountriesData::latest()->filter(request(['search']))->get(),
		]);
	}

	public function sort()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.country', [
			'deaths'    => CountriesData::sum('deaths'),
			'recovers'  => CountriesData::sum('recovered'),
			'confirms'  => CountriesData::sum('confirmed'),
			'countries' => CountriesData::orderBy(request('sort'), request('order'))->get(),
		]);
	}

	public function logout()
	{
		auth()->logout();

		request()->session()->invalidate();
		request()->session()->regenerate();

		return redirect(route('login'));
	}
}
