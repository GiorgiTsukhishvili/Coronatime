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

		$this->artisan('command:request_data')->assertSuccessful();
	}
}
