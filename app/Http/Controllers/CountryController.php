<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session; // Import Session facade
use Inertia\Inertia;

class CountryController extends Controller
{
    private $countries;
    private const SESSION_KEY = 'cached_countries'; // Define a constant for the session key

    public function __construct()
    {
        // Check if countries data is already in the session
        if (Session::has(self::SESSION_KEY)) {
            $this->countries = Session::get(self::SESSION_KEY);
        } else {
            // If not in session, fetch the data
            try {
                $response = Http::get('https://restcountries.com/v3.1/independent?fields=name,capital,region,population,flags');

                // Check if the request was successful
                if ($response->successful()) {
                    $this->countries = $response->json();
                    // Store the fetched data in the session for subsequent requests
                    Session::put(self::SESSION_KEY, $this->countries);
                } else {
                    // Handle API error, e.g., log it or set an empty array
                    \Log::error('Failed to fetch countries from API: ' . $response->status());
                    $this->countries = [];
                }
            } catch (\Exception $e) {
                // Handle network or other exceptions
                \Log::error('Exception while fetching countries: ' . $e->getMessage());
                $this->countries = [];
            }
        }
    }

    public function table()
    {
        return Inertia::render('Countries/Table', [
            'countries' => $this->countries,
        ]);
    }

    public function cards()
    {
        return Inertia::render('Countries/Cards', [
            'countries' => $this->countries,
        ]);
    }
}
