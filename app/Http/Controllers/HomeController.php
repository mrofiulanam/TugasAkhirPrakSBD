<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $datas = DB::table('sewa')
                ->join('lapangan', 'lapangan.id_lapangan', '=', 'sewa.id_lapangan')
                ->join('penyewa', 'penyewa.id_penyewa', '=', 'sewa.id_sewa')
                ->get();

        return view('home.index')
            ->with('datas', $datas);
    }
}