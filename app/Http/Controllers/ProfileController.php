<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = User::findOrFail(Auth::user()->id);

        return view('pages.profile.profile-member')->with([
            'profiles' => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $profile = User::findOrFail($profile);

        return view('pages.profile.edit-profile')->with([
            'profiles' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile)
    {
        $old_nama = User::findOrFail($profile);

        $request->validate([
            'email' => 'required|email',
            'nohp' => 'required|string',
            'alamat' => 'required|string'
        ]);

        if ($request->nama !== $old_nama->nama) {
            $request->validate([
                'nama' => 'required|unique:users,nama'
            ]);
        }

        User::where('id', $profile)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
