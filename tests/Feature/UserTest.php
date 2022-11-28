<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();

		$this->user = User::factory()->create();
	}

		public function test_user_can_access_worldwide_page()
		{
			$response = $this->actingAs($this->user)->get(route('worldwide', ['lang' => app()->getLocale()]));

			$response->assertSuccessful();
		}

		public function test_user_can_access_country_page()
		{
			$response = $this->actingAs($this->user)->get(route('by-country', ['lang' => app()->getLocale()]));

			$response->assertSuccessful();
		}

		public function test_user_can_sort_countries()
		{
			$response = $this->actingAs($this->user)->get(route('sort', ['lang' => app()->getLocale(), 'sort' =>  'deaths', 'order' => 'desc']));

			$response->assertSuccessful();
		}

		public function test_user_can_logout()
		{
			$response = $this->actingAs($this->user)->get(route('logout', ['lang' => app()->getLocale()]));

			$response->assertRedirect(route('login', ['lang' => app()->getLocale()]));
		}
}
