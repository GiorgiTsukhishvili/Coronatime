<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::drop('countries_data');

		Schema::create('country_data', function (Blueprint $table) {
			$table->id();
			$table->text('name');
			$table->integer('confirmed');
			$table->integer('recovered');
			$table->integer('deaths');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('country_data');
	}
};
