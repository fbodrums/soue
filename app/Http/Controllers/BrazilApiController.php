<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BrazilApiController extends Controller
{
    public function getCNPJ($cnpj)
    {
        $url = "https://brasilapi.com.br/api/cnpj/v1/{$cnpj}";

        $response = Http::withoutVerifying()->get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'CNPJ not found.'], 404);
        }
    }
}
