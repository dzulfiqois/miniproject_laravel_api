<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with('buku', 'pustakawan')->get();

        return response()->json([
            'data' => $records
        ]);
    }

    public function store(Request $request)
    {
        $records = $request->all();
        $success = Record::create($records);

        return response()->json([
            'data' => "Pendataan berhasil."
        ]);
    }

    public function update(Request $request){
        $records = Record::find($request->id);
        $records->tanggal_masuk = $request->tanggal_masuk;
        $result = $records->save();

        if($result){
            return response()->json([
                'data'=>'Pendataan berhasil diubah'
            ]);
        } else{
            return response()->json([
                'data'=>'Pendataan gagal diubah'
            ]);
        }
    }

    // public function update(Request $request)
    // {
    //     $records = Record::findOrFail($request->id);

    //     $update = $request->all();
    //     $records->fill($update);
    //     $records->save();

    //     return response()->json([
    //         'data' => 'Record berhasil diperbarui'
    //     ]);
    // }

    public function destroy($id)
    {
        $records = Record::find($id);
        $success = $records->delete();

        if ($success) {
            return ['data' => 'Record dihapus.'];
        } else {
            return ['data' => 'Record gagal dihapus.'];
        }
    }
}
