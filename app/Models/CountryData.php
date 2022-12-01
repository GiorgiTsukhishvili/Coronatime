<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CountryData extends Model
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
		if ($filters['search'] ?? false)
		{
			if (app()->getLocale() === 'en')
			{
				$query->where('name->en', 'like', '%' . ucfirst($filters['search']) . '%');
			}
			if (app()->getLocale() === 'ka')
			{
				$query->where('name->ka', 'like', '%' . ucfirst($filters['search']) . '%');
			}
		}
	}
}
