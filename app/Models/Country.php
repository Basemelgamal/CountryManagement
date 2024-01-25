<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function localizations()
    {
        return $this->hasMany(CountryLocalizations::class);
    }

    public function getTitleArAttribute(){
        return $this->localizations->where('locale_id', 1);
    }
}
