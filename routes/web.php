<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::redirect('/', '/countries/table');

Route::get('/countries/table', [CountryController::class, 'table']);

Route::get('/countries/cards', [CountryController::class, 'cards']);