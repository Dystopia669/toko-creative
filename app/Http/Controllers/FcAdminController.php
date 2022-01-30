<?php

namespace App\Http\Controllers;

use App\Models\fc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FcAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fca = fc::with('fc')->orderBy('id_user', 'asc')->paginate(6);


        return view('pages.fc.fc-admin')->with([
            'fcs' => $fca,
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
    public function edit($fca)
    {
        $fca = fc::firstWhere('id_fc', $fca);

        return view('pages.fc.fc-edit-admin')->with([
            'fca' => $fca
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fca)
    {
        $old_file = fc::firstWhere('id_fc', $fca);

        $request->validate([
            'file' => 'required',
            'halaman_awal' => 'required|numeric',
            'halaman_akhir' => 'required|numeric'
        ]);

        if ($request->file !== $old_file->file) {
            $request->validate([
                'file' => 'required|unique:fcs,file'
            ]);
        }

        $jumhalaman = $request->halaman_akhir - $request->halaman_awal;
        $totalharga = $jumhalaman * 200;

        fc::where('id_fc', $fca)->update([
            'file' => $request->file,
            'halaman_awal' => $request->halaman_awal,
            'halaman_akhir' => $request->halaman_akhir,
            'jumlah_halaman' => $jumhalaman,
            'total_harga' => $totalharga
        ]);

        return redirect()->route('fcadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fca)
    {

        DB::table('fcs')->where('id_fc', $fca)->delete();

        return redirect()->route('fcadmin.index');
    }
}
