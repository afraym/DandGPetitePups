<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $breeds = Breed::Where('status','=', 1)->paginate(15);
        return view('back.breed.index')->with('breeds' , $breeds);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.breed.create');
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
    public function show(Breed $breed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Breed $breed, Request $request)
    {
        $editBreed = $breed->Where('id', '=' , $request->id)->first();
        // dd($editBreed);
        return view('back.breed.edit')->with('breed', $editBreed);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Breed $breed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Breed $breed)
    {
        $breedId = $request->id;
        $breed= Breed::find($breedId);
        $breed->destroy($breedId); 
        return back()->with('success','Breed Deleted Successfully');
    }
}
