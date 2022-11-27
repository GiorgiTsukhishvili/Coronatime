<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_application_returns_login_page()
	{
		$response = $this->get('/?lang=en');

		$response->assertSuccessful();

		$response->assertViewIs('guest.login');
	}

	public function test_login_returns_error_if_inputs_not_provided()
	{
		$response = $this->post('/?lang=en');

		$response->assertSessionHasErrors(['login', 'password']);
	}

	public function test_login_returns_error_if_login_not_provided()
	{
		$response = $this->post('/?lang=en');

		$response->assertSessionHasErrors(['login']);
	}

	public function test_login_returns_error_if_password_not_provided()
	{
		$response = $this->post('/?lang=en');

		$response->assertSessionHasErrors(['password']);
	}

	public function test_login_returns_error_if_password_is_less_then_three_symbol()
	{
		$response = $this->post('/?lang=en', ['password' => 'ps']);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_login_returns_error_if_login_is_less_then_three_symbol()
	{
		$response = $this->post('/?lang=en', ['login' => 'sd']);

		$response->assertSessionHasErrors(['login']);
	}

	public function test_login_returns_error_if_user_does_not_exists()
	{
		$response = $this->post('/?lang=en', ['login' => 'user@redberry.ge', 'password' => 'password']);

		$response->assertSessionHasErrors(['login' => 'login.login-error']);
	}

	public function test_login_redirects_user_to_confirmation_page_if_email_is_not_verified()
	{
		$email = 'user@redberry.ge';
		$password = bcrypt('password');

		User::factory()->create(
			['username'          => 'giorgi',
				'email'             => $email,
				'password'          => $password,
				'email_verified_at' => null, ]
		);

		$response = $this->post('/?lang=en', ['login' => $email, 'password' => 'password']);

		$response->assertViewIs('confirmation.email-sent');
	}

	public function test_login_redirects_user_to_worldwide_page_if_email_is_verified()
	{
		$email = 'user@redberry.ge';
		$password = bcrypt('password');

		User::factory()->create(
			['username'          => 'giorgi',
				'email'             => $email,
				'password'          => $password,
			]
		);

		$response = $this->post('/?lang=en', ['login' => $email, 'password' => 'password']);

		$response->assertRedirect(route('worldwide', ['lang' => app()->getLocale()]));
	}
}
