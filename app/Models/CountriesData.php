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

	public function scopeFilter($query, array $filters)
	{
		if (!is_null($filters[0]) && app()->getLocale() === 'en')
		{
			$query->where('name->en', ucfirst($filters[0]));
		}

		if (!is_null($filters[0]) && app()->getLocale() === 'ka')
		{
			$query->where('name->ka', ucfirst($filters[0]));
		}
	}
}
