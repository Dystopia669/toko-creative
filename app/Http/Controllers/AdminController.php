<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use App\Models\barang;
use App\Models\fc;
use App\Models\print_kertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Gate::allows('isAdmin')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nama = Auth::User()->nama;
        $totalMember = User::where('role', '=', 'user')->count();
        $totalBarang = Barang::count('id');
        $totalFotocopy = fc::count('id_fc');
        $totalPrint = print_kertas::count('id_print');


        return view('pages.dashboard-admin')->with([
            'nama' => $nama,
            'totalMember' => $totalMember,
            'totalBarang' => $totalBarang,
            'totalFotocopy' => $totalFotocopy,
            'totalPrint' => $totalPrint
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
