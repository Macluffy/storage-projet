<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('pages.users', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "photo"=>["required", "min:1", "max:100"],
            "name"=>["required", "min:1", "max:100"],
            "prenom"=>["required", "min:1", "max:100"],
            "age"=>["required", "min:1", "max:100"],
            "email"=>["required", "min:1", "max:100"],
            "password1"=>["required", "min:1", "max:100"],
            "naissance"=>["required", "min:1", "max:100"],
        ]);
        $data = new User;
        $data->photo = $request->file("photo")->hashName();
        $data->name = $request->name;
        $data->prenom = $request->prenom;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->password1 = Hash::make($request->password1);
        $data->naissance = $request->naissance;
        $data->save();
        $request->file("photo")->storePublicly("img", "public");
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('layouts.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('layouts.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            "photo"=>["required", "min:1", "max:10000"],
            "name"=>["required", "min:1", "max:100"],
            "prenom"=>["required", "min:1", "max:100"],
            "age"=>["required", "min:1", "max:100"],
            "email"=>["required", "min:1", "max:100"],
            "password1"=>["required", "min:1", "max:100"],
            "naissance"=>["required", "min:1", "max:100"],
        ]);
        Storage::disk("public")->delete("img/" . $user->photo);
        $user->photo = $request->file("photo")->hashName();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password1 = Hash::make($request->password1);
        $user->naissance = $request->naissance;
        $user->save();
        $request->file("photo")->storePublicly("img", "public");
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk("public")->delete("img/" . $user->photo);
        $user->delete();
        return redirect()->route('users.index');;
    }
}
