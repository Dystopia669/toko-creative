<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fc = fc::where('id_user', '=', Auth::user()->id)->orderBy('id_fc', 'asc')->paginate(6);

        return view('pages.fc.fc-member')->with([
            'fcs' => $fc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.fc.tambah-fc-member');
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
            'file' => 'required',
            'halaman_awal' => 'required|numeric',
            'halaman_akhir' => 'required|numeric'
        ]);

        $path = Storage::putFile(
            'file',
            $request->file('file')
        );

        $jumlahHalaman = 1;

        if ($request->halaman_akhir != '1') {
            $jumlahHalaman = $request->halaman_akhir - $request->halaman_awal;
        }

        $totalharga = $jumlahHalaman * 200;

        fc::create([
            'id_user' => Auth::user()->id,
            'halaman_awal' => $request->halaman_awal,
            'halaman_akhir' => $request->halaman_akhir,
            'jumlah_halaman' => $jumlahHalaman,
            'total_harga' => $totalharga,
            'file' => $path
        ]);

        return redirect()->route('fc.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
