<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\RomanNumeralConverter;

class IntegerConverter extends Model
{
    protected $guarded = [];

    public function convertIngeterToRoman($integer)
    {  
        $roman_converter = new RomanNumeralConverter();
        return $roman_converter->convertInteger($integer);
    }

    public function storeEntry($integer, $romanValue)
    {
        return $this->create([
            'integer' => $integer,
            'roman_numeral' => $romanValue
        ]);
    }

    public function scopeTopConverted($query, $limit = 10)
    {
        return $query->select('integer', 'roman_numeral', \DB::raw('count(*) as count'))
                    ->groupBy('integer', 'roman_numeral')
                    ->orderBy('count', 'desc')
                    ->limit($limit);
    }
}
