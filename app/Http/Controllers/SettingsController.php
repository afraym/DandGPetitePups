<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use SoulDoit\SetEnv\Env;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings)
    {
        $keys = request()->only(['APP_NAME','Gemini_API','RECAPTCHAV3_SITEKEY','RECAPTCHAV3_SECRET',
        'GOOGLE_CLIENT_ID','GOOGLE_CLIENT_SECRET','FACEBOOK_CLIENT_ID','FACEBOOK_CLIENT_SECRET']);
        $envService = new Env(); 
        foreach($keys as $key => $value){
            if(!$value){
                $value = "";
            }
            $envService->set($key,$value);
            
        }
        
        $keys = request()->only(['description','address','phone','email','facebook','instagram','twitter',
        'youtube','tiktok','headercode','footercode','','','','','','','','']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
