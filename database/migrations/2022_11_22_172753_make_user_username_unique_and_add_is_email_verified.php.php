<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('username')->after('id');
			$table->boolean('is_email_verified')->default(0)->after('email');
		});
	}

	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
		});
	}
};
