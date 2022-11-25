<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('users_verify', function (Blueprint $table) {
			$table->integer('user_id');
			$table->string('token');
			$table->timestamps();
		});

		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('is_email_verified');
		});
	}

	public function down()
	{
		Schema::dropIfExists('users_verify_and_drop_is_email_verified');
	}
};
