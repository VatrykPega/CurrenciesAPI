<?php

namespace App\Http\Controllers;

use App\Models\CurrenciesRates;
use Illuminate\Http\Request;

class CurrenciesRatesController extends Controller
{
    public function post(Request $request)
    {
        $validated = $request->validate([
            'currency' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        CurrenciesRates::create($validated);

        return response()->json(['status' => 'success']);
    }

    public function get($date = null, $currency = null)
    {
        if (!$date) {
            $date = now()->format('Y-m-d');
        }
        if ($currency) {
            $currenciesRates = CurrenciesRates::whereCurrencyAndDate(CurrenciesRates::query(), $currency, $date);
        } else {
            $currenciesRates = CurrenciesRates::whereDate(CurrenciesRates::query(), $date);
        }
        return response()->json($currenciesRates);
    }
}
