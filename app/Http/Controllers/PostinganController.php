<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index()
    {
        $postingan = barang::orderBy('nama', 'asc')->paginate(6);

        return view('pages.dashboard-user')->with([
            'barangs' => $postingan
        ]);
    }
}
