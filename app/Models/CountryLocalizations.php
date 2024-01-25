<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLocalizations extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'locale_id',
        'title',
        'description'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
