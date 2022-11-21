<?php

namespace App\Console\Commands;

use App\Models\CountriesData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RequestData extends Command
{
	protected $signature = 'command:request_data';

	protected $description = 'Request data from foreign api';

	public function handle()
	{
		$everyCountry = Http::get('https://devtest.ge/countries')->json();

		foreach ($everyCountry as $country)
		{
			$data['name'] = $country['name'];

			$eachCountry = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']])->json();

			$newCountry = new CountriesData();

			$newCountry->setTranslation('name', 'en', $country['name']['en'])
			->setTranslation('name', 'ka', $country['name']['ka'])
			->setAttribute('confirmed', $eachCountry['confirmed'])
			->setAttribute('recovered', $eachCountry['recovered'])
			->setAttribute('deaths', $eachCountry['deaths'])
			->save();
		}

		return Command::SUCCESS;
	}
}
