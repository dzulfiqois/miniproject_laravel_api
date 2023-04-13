<?php

namespace App\Http\Controllers;

use App\Models\Pustakawan;
use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    public function index()
    {
        $pustakawans = Pustakawan::all();

        return response()->json([
            '$data' => $pustakawans
        ]);
    }

    public function store(Request $request)
    {
        $pustakawans = Pustakawan::create([
            'nama_pustakawan' => $request->nama_pustakawan,
        ]);

        return response()->json([
            'data' => $pustakawans
        ]);
    }

    public function show($nama_pustakawan)
    {
        $pustakawans = Pustakawan::find($nama_pustakawan);

        return response()->json([
            'data' => $pustakawans
        ]);
    }

    public function update(Request $request)
    {
        $pustakawans = Pustakawan::find($request->id);
        $pustakawans->nama_pustakawan = $request->nama_pustakawan;
        $result = $pustakawans->save();

        if ($result) {
            return ['data' => 'Nama Pustakawan sudah diperbarui.'];
        } else {
            return ['data' => 'Nama Pustakawan gagal diperbarui.'];
        }
    }

    public function destroy($id)
    {
        $pustakawans = Pustakawan::find($id);
        $success = $pustakawans->delete();

        if ($success) {
            return ['data' => 'Pustakawan dihapus.'];
        } else {
            return ['data' => 'Pustakawan gagal dihapus.'];
        }
    }
}
