<?php

namespace App\Http\Controllers;

use App\Models\Ai;
use Illuminate\Http\Request;
use Gemini;

class AiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $details = $request->only([
            'name','price', 'breed_name','Photo_Date', 'Gender', 'Size', 
            'Birth_Date', 'Color', 'Available_From', 'Available_To',
            'Champion_Bloodlines', 'Champion_Sired',
            'Vaccinations_And_Dewormings', 'Health_Certificate', 'Health_Record',
            'Health_Warranty','location',
          ]);

        $Gemini_API = getenv('Gemini_API');
        $client = Gemini::client($Gemini_API);

        $shortDescription = $client->geminiPro()->generateContent("Generate a creatve short description to SELL a puppy
        with this details".json_encode($details))->text();

        $description = $client->geminiPro()->generateContent("Generate a description to sell a puppy
        using this details ".json_encode($details))->text();

        $keywords = $client->geminiPro()->generateContent("generate meta keywords separated by comma for SEO to sell a puppy
        using this details ".json_encode($details))->text();

        return response()->json(['shortDesription' =>  $shortDescription, 'longDescription' => $description, 'keywords' => $keywords],200); 
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
    public function show(Ai $ai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ai $ai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ai $ai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ai $ai)
    {
        //
    }
}
