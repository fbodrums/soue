<?php

use App\Http\Controllers\BrazilApiController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::resource('invoice', InvoiceController::class);
Route::get('/cnpj/{cnpj}', [BrazilApiController::class, 'getCNPJ']);
