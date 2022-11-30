<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function test_application_returns_password_reset_page()
	{
		$response = $this->get(route('reset', ['lang' => app()->getLocale()]));

		$response->assertViewIs('guest.password-reset');
	}

	public function test_application_returns_error_if_email_is_not_provided_for_password_reset()
	{
		$response = $this->post(route('password-reset.post', ['lang' => app()->getLocale()]));

		$response->assertSessionHasErrors(['email']);
	}

	public function test_application_returns_error_if_email_wrong_for_password_reset()
	{
		$response = $this->post(route('password-reset.post', ['lang' => app()->getLocale()]), ['email' => 'sda']);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_application_returns_error_if_email_does_not_exists_for_password_reset()
	{
		$response = $this->post(route('password-reset.post', ['lang' => app()->getLocale()]), ['email' => 'giorgi@gmail.com']);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_application_returns_success_and_sends_email()
	{
		User::factory()->create(['email' => 'sacdeli@gmail.com']);

		$response = $this->post(route('password-reset.post', ['lang' => app()->getLocale()]), ['email' => 'sacdeli@gmail.com']);

		$response->assertViewIs('confirmation.email-sent');
	}

	public function test_application_returns_new_password_page()
	{
		$token = sha1('new-password');

		$response = $this->get(route('new-password', ['lang' => app()->getLocale()]), ['token' => $token]);

		$response->assertViewIs('confirmation.password-reset', ['token' => request('token')]);
	}

	public function test_application_returns_error_if_password_are_not_provided()
	{
		$response = $this->post(route('new-password.post', ['lang' => app()->getLocale()]));

		$response->assertSessionHasErrors(['password', 'password_confirmation']);
	}

	public function test_application_returns_error_if_passwords_do_not_match()
	{
		$response = $this->post(route('new-password.post', ['lang' => app()->getLocale()]), ['password' => 'asdsad', 'password_confirmation' =>'sadsasdsd']);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_application_returns_error_if_password_is_less_then_three_symbols()
	{
		$response = $this->post(route('new-password.post', ['lang' => app()->getLocale()]), ['password' => 'ww', 'password_confirmation' =>'ww']);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_application_returns_abort_if_token_is_not_provided()
	{
		$response = $this->post(route('new-password.post', ['lang' => app()->getLocale()]), ['password' => '12345', 'password_confirmation' =>'12345']);

		$response->assertStatus(403);
	}

	public function test_application_returns_password_changed()
	{
		$user = User::factory()->create();

		$token = sha1('new-password');

		UserVerify::create([
			'user_id' => $user->id,
			'token'   => $token,
		]);

		$response = $this->post(route('new-password.post', ['lang' => app()->getLocale()]), ['password' => '12345', 'password_confirmation' =>'12345', 'token' => $token]);

		$response->assertViewIs('confirmation.password-changed');
	}
}
