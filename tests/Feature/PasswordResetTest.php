<?php

namespace Tests\Feature;

use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	public function test_application_returns_password_reset_page()
	{
		$response = $this->get(route('reset', ['lang' => app()->getLocale()]));

		$response->assertViewIs('guest.password-reset');
	}
}
