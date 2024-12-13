<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(20);
        return view('back.user.index')->with('users', $users);
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,User $user)
    {
        $editUser = $user->Where('id', '=' , $id)->first();
        // dd($editBreed);
        return view('back.user.edit')->with('user', $editUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $breedId = $request->id;
        $breed= Breed::find($breedId);
        $breed->destroy($breedId); 
        return back()->with('success','Breed Deleted Successfully');
    }
}
