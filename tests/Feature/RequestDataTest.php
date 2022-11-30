<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RequestDataTest extends TestCase
{
	public function test_request_data_with_command()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				['code' => 'AF',
					'name' => [
						'en' => 'Afghanistan',
						'ka' => 'ავღანეთი',
					], ],
			], 200, ['Headers']),
		]);

		Http::fake([
			'https://devtest.ge/get-country-statistics',
		]);

		$this->artisan('command:coronatime-request-data')->assertSuccessful();
	}
}
