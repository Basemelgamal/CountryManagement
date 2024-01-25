<?php
namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Contracts\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface {

    public function store()
    {
        return Country::create();
    }

    public function update(Country $country, array $data)
    {
        return $country->update($data);
    }

    public function delete(Country $country)
    {
        return $country->delete();
    }
}
