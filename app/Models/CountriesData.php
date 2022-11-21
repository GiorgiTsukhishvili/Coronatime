<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CountriesData extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $fillable = [
		'name',
		'confirmed',
		'deaths',
		'recovered',
	];
}
