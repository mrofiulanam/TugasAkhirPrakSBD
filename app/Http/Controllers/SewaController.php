<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class sewaController extends Controller
{
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM sewa WHERE id_sewa = :id_sewa', ['id_sewa' => $id]);
        return redirect()->route('sewa.index')->with('success', 'Data Sewa berhasil dihapus');
    }
    public function edit($id)
    {
        $data = DB::table('sewa')->where('id_sewa', $id)->first();
        return view('sewa.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_sewa' => 'required',
            'id_lapangan' => 'required',
            'id_penyewa' => 'required',
            'tanggal_sewa' => 'required',
            'jam_sewa' => 'required',
            'harga' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE sewa SET id_sewa = :id_sewa, id_lapangan = :id_lapangan, id_penyewa = :id_penyewa, tanggal_sewa = :tanggal_sewa, jam_sewa = :jam_sewa, harga = :harga WHERE id_sewa = :id',
            [
                'id' => $id,
                'id_sewa' => $request->id_sewa,
                'id_lapangan' => $request->id_lapangan,
                'id_penyewa' => $request->id_penyewa,
                'tanggal_sewa' => $request->tanggal_sewa,
                'jam_sewa' => $request->jam_sewa,
                'harga' => $request->harga,
            ]
        );
        return redirect()->route('sewa.index')->with('success', 'Data Sewa berhasil diubah');
    }
    public function index()
    {
        $datas = DB::select('select * from sewa');
        return view('sewa.index')
            ->with('datas', $datas);
    }
    public function create()
    {
        return view('sewa.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_sewa' => 'required',
            'id_lapangan' => 'required',
            'id_penyewa' => 'required',
            'tanggal_sewa' => 'required',
            'jam_sewa' => 'required',
            'harga' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO sewa(id_sewa, id_lapangan, id_penyewa, tanggal_sewa, jam_sewa, harga) VALUES (:id_sewa, :id_lapangan, :id_penyewa, :tanggal_sewa, :jam_sewa, :harga)',
            [
                'id_sewa' => $request->id_sewa,
                'id_lapangan' => $request->id_lapangan,
                'id_penyewa' => $request->id_penyewa,
                'tanggal_sewa' => $request->tanggal_sewa,
                'jam_sewa' => $request->jam_sewa,
                'harga' => $request->harga,
            ]
        );
        return redirect()->route('sewa.index')->with('success', 'Data Sewa berhasil disimpan');
    }
}