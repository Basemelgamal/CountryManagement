<?php
namespace App\Repositories;

use App\Models\CountryLocalizations;
use App\Repositories\Contracts\CountryLocalizationRepositoryInterface;

class CountryLocalizationRepository implements CountryLocalizationRepositoryInterface {

    public function store(array $data)
    {
        return CountryLocalizations::create($data);
    }

    public function update(CountryLocalizations $countryLocalizations, array $data)
    {
        return $countryLocalizations->update($data);
    }

    public function delete(CountryLocalizations $countryLocalizations)
    {
        return $countryLocalizations->delete();
    }
}
