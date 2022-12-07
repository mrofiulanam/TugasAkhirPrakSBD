<?php

namespace App\Http\Controllers;

use Hamcrest\Core\IsNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class penyewaController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama_penyewa;
        $datas = DB::table('penyewa')->where('deleted_at', '<>', '' )->where('nama_penyewa', 'LIKE', '%'.$get_nama.'%')->get();
        return view('penyewa.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE penyewa SET deleted_at = NULL WHERE id_penyewa = :id_penyewa', ['id_penyewa' => $id]);
        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil di-restore');
    }
    public function trash()
    {
        $datas = DB::select('select * from penyewa where deleted_at is not null');
        return view('penyewa.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE penyewa SET deleted_at=current_timestamp() WHERE id_penyewa = :id_penyewa', ['id_penyewa' => $id]);
        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil dihapus');
    }
    public function search(Request $request)
    {
        $get_nama = $request->nama_penyewa;
        $datas = DB::table('penyewa')->where('deleted_at', NULL )->where('nama_penyewa', 'LIKE', '%'.$get_nama.'%')->get();
        return view('penyewa.index')->with('datas', $datas);
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM penyewa WHERE id_penyewa = :id_penyewa', ['id_penyewa' => $id]);
        return redirect()->route('penyewa.trash')->with('success', 'Data Penyewa berhasil dihapus');
        }
    public function edit($id)
    {
        $data = DB::table('penyewa')->where('id_penyewa', $id)->first();
        return view('penyewa.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_penyewa' => 'required',
            'nama_penyewa' => 'required',
            'asal_penyewa' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE penyewa SET id_penyewa = :id_penyewa, nama_penyewa = :nama_penyewa, asal_penyewa = :asal_penyewa WHERE id_penyewa = :id',
            [
                'id' => $id,
                'id_penyewa' => $request->id_penyewa,
                'nama_penyewa' => $request->nama_penyewa,
                'asal_penyewa' => $request->asal_penyewa,
            ]
        );
        return redirect()->route('penyewa.index')->with('success', 'Data Penyewa berhasil diubah');
    }
    public function index()
    {
        $datas = DB::select('select * from penyewa sopir where deleted_at is null');
        return view('penyewa.index')
            ->with('datas', $datas);
    }
    public function create()
    {
        return view('penyewa.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_penyewa' => 'required',
            'nama_penyewa' => 'required',
            'asal_penyewa' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO penyewa(id_penyewa, nama_penyewa, asal_penyewa) VALUES (:id_penyewa, :nama_penyewa, :asal_penyewa)',
            [
                'id_penyewa' => $request->id_penyewa,
                'nama_penyewa' => $request->nama_penyewa,
                'asal_penyewa' => $request->asal_penyewa,
            ]
        );
        return redirect()->route('penyewa.index')->with('success', 'Data Penyewa berhasil disimpan');
    }
}