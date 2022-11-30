<?php

namespace App\Console\Commands;

use App\Models\CountryData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RequestData extends Command
{
	protected $signature = 'command:coronatime-request-data';

	protected $description = 'Request data from foreign api';

	public function handle()
	{
		$everyCountry = Http::get('https://devtest.ge/countries')->json();

		foreach ($everyCountry as $country)
		{
			$eachCountry = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']])->json();

			CountryData::updateOrCreate(
				['name->en' => $country['name']['en']],
				['name'         => $country['name'],
					'confirmed'    => $eachCountry['confirmed'],
					'recovered'    => $eachCountry['recovered'],
					'deaths'       => $eachCountry['deaths'], ]
			);
		}

		return Command::SUCCESS;
	}
}
