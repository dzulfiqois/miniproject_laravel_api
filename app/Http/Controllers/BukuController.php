<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();

        return response()->json([
            'data' => $bukus
        ]);
    }

    public function store(Request $request) //create
    {
        $bukus = Buku::create([
            'judul_buku' => $request->judul_buku,
            'jenis_buku' => $request->jenis_buku,
            'penulis_buku' => $request->penulis_buku,
            'penerbit_buku' => $request->penerbit_buku,
            'tahun_terbit_buku' => $request->tahun_terbit_buku,
        ]);


        return response()->json([
            'data' => $bukus,
        ]);
    }

    public function show($judul_buku)
    {
        $bukus = Buku::find($judul_buku);

        return response()->json([
            'data' => $bukus
        ]);
    }

    public function update(Request $request) //update (buku/judul_buku-awal?id&judul_buku-akhir)
    {
        $bukus = Buku::find($request->id);
        $bukus->judul_buku = $request->judul_buku;
        // $bukus->jenis_buku = $request->jenis_buku;
        // $bukus->penulis_buku = $request->penulis_buku;
        // $bukus->penerbit_buku = $request->pengarang_buku;
        // $bukus->tahun_terbit_buku = $request->tahun_terbit_buku;
        // $bukus->id = $request->id;
        $result = $bukus->save();

        if ($result) {
            return ['data' => 'Buku sudah diperbarui.'];
        } else {
            return ['data' => 'Buku gagal diperbarui.'];
        }
    }

    public function destroy($id)
    { //delete dengan id

        $bukus = Buku::find($id);
        $success = $bukus->delete();

        if ($success) {
            return ['data' => 'Buku dihapus.'];
        } else {
            return ['data' => 'Buku gagal dihapus.'];
        }
    }

    // public function delete($judul_buku){
    //     return ['delete' => 'buku dihapus'.$judul_buku];
    // }

    // public function destroy($judul_buku)    //delete
    // {
    //     return Buku::destroy($judul_buku);
    //     return ['Delete' => 'sudah'];
    // }
}
