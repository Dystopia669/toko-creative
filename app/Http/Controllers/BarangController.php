<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('nama', 'asc')->paginate(6);

        return view('pages.barang.barang-admin')->with([
            'barangs' => $barang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.barang.tambah-barang');
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
            'nama' => 'required|unique:barangs,nama',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required'
        ]);

        $path = Storage::putFile(
            'gambar',
            $request->file('gambar')
        );

        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $path
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($barang)
    {
        $barang = barang::findOrFail($barang);

        return view('pages.barang.edit-barang')->with([
            'barangs' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $barang)
    {
        $old_nama = barang::findOrFail($barang);

        $request->validate([
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required'
        ]);
        $path = Storage::putFile(
            'gambar',
            $request->file('gambar')
        );

        Barang::where('id', $barang)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $path
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($barang)
    {
        barang::destroy($barang);

        return redirect()->route('barang.index');
    }
}
