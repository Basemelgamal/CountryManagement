<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Locale;
use App\Repositories\Contracts\CountryLocalizationRepositoryInterface;
use App\Repositories\Contracts\CountryRepositoryInterface;

class CountryService {

    protected $countryRepositoryInterface, $countryLocalizationRepositoryInterface;

    public function __construct(CountryRepositoryInterface $countryRepositoryInterface, CountryLocalizationRepositoryInterface $countryLocalizationRepositoryInterface) {
        $this->countryRepositoryInterface = $countryRepositoryInterface;
        $this->countryLocalizationRepositoryInterface = $countryLocalizationRepositoryInterface;
    }

    public function index(){
        // return $this->countryRepositoryInterface->index();
    }

    public function store($data){
        $country = $this->countryRepositoryInterface->store();
        foreach(Locale::all() as $locale){
            $this->countryLocalizationRepositoryInterface->store(['locale_id' => $locale->id, 'country_id' => $country->id, 'title' => $data['title'][$locale->code], 'description' => $data['description'][$locale->code] ]);
        }
        return $country;
    }

    public function update(Country $country, array $data){

        foreach(Locale::all() as $locale){
            foreach($country->localizations as $localization){
                $this->countryLocalizationRepositoryInterface->update($localization, ['locale_id' => $locale->id, 'country_id' => $country->id, 'title' => $data['title'][$locale->code], 'description' => $data['description'][$locale->code] ]);
            }
        }
        return $country;
    }

    public function delete(Country $country){
        foreach($country->localizations as $localization){
            $this->countryLocalizationRepositoryInterface->delete($localization);
        }

        return  $this->countryRepositoryInterface->delete($country);
    }
}
