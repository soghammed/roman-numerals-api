<?php

namespace App\Services;

class RomanNumeralConverter implements IntegerConverterInterface
{
    public function convertInteger(int $integer): string
    {
        $romanData = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1);
        $result = '';
        foreach($romanData as $rom => $val){
            $result .= str_repeat($rom, (int) ($integer / $val));
            $integer %= $val;
        }
        return $result;
    }
}
