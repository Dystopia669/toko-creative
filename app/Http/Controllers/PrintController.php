<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\print_kertas;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $print = print_kertas::where('id_user', '=', Auth::user()->id)->orderBy('id_print', 'asc')->paginate(6);

        return view('pages.print.print-member')->with([
            'prints' => $print
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.print.tambah-print-member');
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

        $jumhalaman = $request->halaman_akhir - $request->halaman_awal;
        $total_harga = $jumhalaman * 500;

        print_kertas::create([
            'id_user' => Auth::user()->id,
            'halaman_awal' => $request->halaman_awal,
            'halaman_akhir' => $request->halaman_akhir,
            'jumlah_halaman' => $jumhalaman,
            'total_harga' => $total_harga,
            'file' => $path
        ]);

        return redirect()->route('print.index');
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
