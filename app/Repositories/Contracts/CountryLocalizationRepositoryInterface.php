<?php
namespace App\Repositories\Contracts;

use App\Models\Country;
use App\Models\CountryLocalizations;

interface CountryLocalizationRepositoryInterface
{
    public function store(array $data);
    public function update(CountryLocalizations $countryLocalizations, array $data);
    public function delete(CountryLocalizations $countryLocalizations);
}
