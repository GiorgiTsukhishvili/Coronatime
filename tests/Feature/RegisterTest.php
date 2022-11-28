<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_application_returns_register_page()
	{
		$response = $this->get(route('register', ['lang' => app()->getLocale()]));

		$response->assertViewIs('guest.register');
	}

	public function test_application_returns_confirmation_page_after_registration()
	{
		$response = $this->post(
			route('post-register', ['lang' => app()->getLocale()]),
			[
				'username'              => 'giorgi',
				'email'                 => 'giorgi@redberry.ge',
				'password'              => 'giorgi',
				'password_confirmation' => 'giorgi',
			]
		);

		$response->assertViewIs('confirmation.email-sent');
	}

	public function test_application_returns_error_on_registration_if_data_is_not_provided()
	{
		$response = $this->post(
			route('post-register', ['lang' => app()->getLocale()]),
		);

		$response->assertSessionHasErrors(['username', 'email', 'password', 'password_confirmation']);
	}

	public function test_application_returns_error_after_invalid_data_on_registration()
	{
		$response = $this->post(
			route('post-register', ['lang' => app()->getLocale()]),
			[
				'username'              => 'gi',
				'email'                 => 'gi',
				'password'              => 'gi',
				'password_confirmation' => 'gi',
			]
		);

		$response->assertSessionHasErrors(['username', 'email', 'password']);
	}

	public function test_application_returns_error_if_token_is_not_provided_registration()
	{
		$response = $this->get(route('verify-account', ['lang' => app()->getLocale()]));

		$response->assertStatus(403);
	}

	public function test_application_returns_email_verified_page_after_email_verification()
	{
		$user = User::factory()->create(['email_verified_at' => null]);

		$token = sha1('new-user');

		UserVerify::create([
			'user_id' => $user->id,
			'token'   => $token,
		]);

		$response = $this->get(route('verify-account', ['lang' => app()->getLocale(), 'token' => $token]));

		$response->assertViewIs('confirmation.email-verified');
	}
}
