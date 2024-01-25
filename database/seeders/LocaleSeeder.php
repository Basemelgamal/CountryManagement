<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = [
            ['code'  => 'en', 'name'  => 'English'],
            ['code'  => 'ar', 'name'  => 'Arabic' ],
        ];

        foreach($locales as $locale){
            Locale::create($locale);
        }
    }
}
