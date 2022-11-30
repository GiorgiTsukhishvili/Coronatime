<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::rename('countries_data', 'country_data');
	}

	public function down()
	{
	}
};
