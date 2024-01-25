<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Models\Locale;
use App\Services\CountryService;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    protected $countryService, $countryLocalizationRepositoryInterface;
    public function __construct(CountryService $countryService) {
        $this->countryService = $countryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = [
            'locales'   => Locale::all(),
            'countries' => Country::all(),
        ];

        return view('countries.index', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $input = [
            'locales'   => Locale::all(),
            'action'    => route('countries.store'),
            'method'    => 'POST'
        ];
        return view('countries.create', $input);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        // DB::beginTransaction();
        // try {
            $this->countryService->store($request->validated());
            // DB::commit();
            return redirect()->route('countries.index')->with(['success' => 'Added Successfully']);
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        //     return redirect()->back()->with(['error' => $e->getMessage()]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $input = [
            'country'   => $country,
            'locales'   => Locale::all(),
            'action'    => route('countries.update', $country),
            'method'    => 'PUT'
        ];
        return view('countries.edit', $input);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        DB::beginTransaction();
        try {
            $this->countryService->update($country, $request->validated());
            DB::commit();
            return redirect()->route('countries.index')->with(['success' => 'Updated Successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            return $this->countryService->delete($country);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
