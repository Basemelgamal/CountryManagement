<?php
namespace App\Repositories\Contracts;

use App\Models\Country;

interface CountryRepositoryInterface
{
    public function store();
    public function update(Country $country, array $data);
    public function delete(Country $country);
}
