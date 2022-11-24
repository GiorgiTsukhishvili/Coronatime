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
			$table->string('username')->after('id');
		});
	}

	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
		});
	}
};
