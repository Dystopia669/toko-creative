<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = User::where('role', '=', 'user')->paginate(6);

        return view('pages.member.daftar-member')->with([
            'members' => $member
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.member.tambah-member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nohp' => ['required'],
            'alamat' => ['required']
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'role' => 'user'
        ]);

        return redirect()->route('member.index');
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
    public function edit($member)
    {
        $member = User::findOrFail($member);

        return view('pages.member.edit-member')->with([
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $member)
    {
        $old_nama = User::findOrFail($member);

        $request->validate([
            'nohp' => 'required|string',
            'alamat' => 'required|string'
        ]);

        if ($request->nama !== $old_nama->nama) {
            $request->validate([
                'nama' => 'required|unique:users,nama'
            ]);
        }

        User::where('id', $member)->update([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($member)
    {
        User::destroy($member);

        return redirect()->route('member.index');
    }
}
