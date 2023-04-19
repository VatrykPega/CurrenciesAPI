<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CurrenciesRates extends Model
{
    use HasFactory;

    protected $fillable = ['currency', 'date', 'amount', 'created_at'];

    public static function whereDate($query, $date)
    {
        return $query->select('currency', DB::raw('MAX(date) as date'), DB::raw('MAX(amount) as amount'))
            ->whereDate('date', $date)
            ->groupBy('currency')
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public static function whereCurrencyAndDate($query, $currency, $date)
    {
        return $query->select('currency', DB::raw('MAX(date) as date'), DB::raw('MAX(amount) as amount'))
            ->where('currency', $currency)
            ->whereDate('date', $date)
            ->groupBy('currency')
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
