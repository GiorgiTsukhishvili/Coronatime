<?php

namespace App\Http\Controllers;

use App\Models\CountryData;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	public function worldwide()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.worldwide', [
			'deaths'   => CountryData::sum('deaths'),
			'recovers' => CountryData::sum('recovered'),
			'confirms' => CountryData::sum('confirmed'),
		]);
	}

	public function byCountry()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.country', [
			'deaths'    => CountryData::sum('deaths'),
			'recovers'  => CountryData::sum('recovered'),
			'confirms'  => CountryData::sum('confirmed'),
			'countries' => CountryData::latest()->filter(request(['search']))->get(),
		]);
	}

	public function sort()
	{
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		return view('users.country', [
			'deaths'    => CountryData::sum('deaths'),
			'recovers'  => CountryData::sum('recovered'),
			'confirms'  => CountryData::sum('confirmed'),
			'countries' => CountryData::filter(request(['search']))->orderBy(request('sort'), request('order'))->get(),
		]);
	}

	public function logout()
	{
		Auth::logout();
		if (request('lang'))
		{
			app()->setLocale(request('lang'));
		}

		request()->session()->invalidate();
		request()->session()->regenerate();

		return redirect(route('login', ['lang' => app()->getLocale()]));
	}
}
