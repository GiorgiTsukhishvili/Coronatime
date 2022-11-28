<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
	public function test_application_returns_register_page()
	{
		$response = $this->get(route('register', ['lang' => app()->getLocale()]));

		$response->assertViewIs('guest.register');
	}
}
