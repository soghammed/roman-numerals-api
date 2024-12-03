<?php

namespace App\Http\Controllers;

use App\Models\IntegerConverter;
use Illuminate\Http\Request;
use App\Http\Resources\IntegerConverterResource;

class IntegerConverterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IntegerConverterResource(
            IntegerConverter::orderBy('created_at', 'desc')
                    ->get(['integer', 'roman_numeral'])
        );
    }

    public function convertRoman(Request $request, IntegerConverter $integerConverter)
    {
        $request->validate([
            'num' => 'required|integer'
        ]);

        $romanValue = $integerConverter->convertIngeterToRoman($request->num);

        $integerConverter = $integerConverter->storeEntry($request->num, $romanValue);

        return response()->json([
            'message' => 'Roman numeral has been converted successfully',
            'data' => $integerConverter->roman_numeral
        ]);
    }
    
    public function getTopConvertedIntegers(IntegerConverter $integerConverter)
    {
        $topConvertedIntegers = $integerConverter->topConverted()->get();

        return response()->json([
            'message' => 'Top 10 converted integers',
            'data' => $topConvertedIntegers
        ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RomanNumeral $romanNumeral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RomanNumeral $romanNumeral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RomanNumeral $romanNumeral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RomanNumeral $romanNumeral)
    {
        //
    }
}
