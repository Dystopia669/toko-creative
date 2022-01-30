<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\print_kertas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $print = print_kertas::with('print')->orderBy('id_user', 'asc')->paginate(6);

        return view('pages.print.print-admin')->with([
            'prints' => $print,
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
    public function edit($print)
    {
        $print = print_kertas::firstWhere('id_print', $print);

        return view('pages.print.print-edit-admin')->with([
            'print' => $print
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $print)
    {
        $old_file = print_kertas::firstWhere('id_print', $print);

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
        $totalharga = $jumhalaman * 500;

        print_kertas::where('id_print', $print)->update([
            'file' => $request->file,
            'halaman_awal' => $request->halaman_awal,
            'halaman_akhir' => $request->halaman_akhir,
            'jumlah_halaman' => $jumhalaman,
            'total_harga' => $totalharga
        ]);

        return redirect()->route('printadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($print)
    {
        DB::table('print_kertas')->where('id_print', $print)->delete();

        return redirect()->route('printadmin.index');
    }
}
