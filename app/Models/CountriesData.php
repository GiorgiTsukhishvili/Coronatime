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
		if ($filters['search'] ?? false)
		{
			$query->where('name->en', 'like', '%' . ucfirst($filters['search']) . '%')
			->orWhere('name->ka', 'like', '%' . ucfirst($filters['search']) . '%')
			->first();
		}
	}
}
