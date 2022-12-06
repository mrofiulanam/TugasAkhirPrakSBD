<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LapanganController extends Controller
{
    public function search(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('lapangan')->where('nama_lapangan', 'LIKE', '%' . $get_nama . '%')->get();
        return view('lapangan.index')->with('datas', $datas);
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM lapangan WHERE id_lapangan = :id_lapangan', ['id_lapangan' => $id]);
        return redirect()->route('lapangan.index')->with('success', 'Data lapangan berhasil dihapus');
    }
    public function edit($id)
    {
        $data = DB::table('lapangan')->where('id_lapangan', $id)->first();
        return view('lapangan.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_lapangan' => 'required',
            'nama_lapangan' => 'required',
            'tipe_lapangan' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE lapangan SET id_lapangan = :id_lapangan, nama_lapangan = :nama_lapangan, tipe_lapangan = :tipe_lapangan WHERE id_lapangan = :id',
            [
                'id' => $id,
                'id_lapangan' => $request->id_lapangan,
                'nama_lapangan' => $request->nama_lapangan,
                'tipe_lapangan' => $request->tipe_lapangan,
            ]
        );
        return redirect()->route('lapangan.index')->with('success', 'Data lapangan berhasil diubah');
    }
    public function index()
    {
        $datas = DB::select('select * from lapangan');
        return view('lapangan.index')
            ->with('datas', $datas);
    }
    public function create()
    {
        return view('lapangan.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_lapangan' => 'required',
            'nama_lapangan' => 'required',
            'tipe_lapangan' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO lapangan(id_lapangan, nama_lapangan, tipe_lapangan) VALUES (:id_lapangan, :nama_lapangan, :tipe_lapangan)',
            [
                'id_lapangan' => $request->id_lapangan,
                'nama_lapangan' => $request->nama_lapangan,
                'tipe_lapangan' => $request->tipe_lapangan,
            ]
        );
        return redirect()->route('lapangan.index')->with('success', 'Data lapangan berhasil disimpan');
    }
}