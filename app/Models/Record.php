<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'id_pustakawan',
        'tanggal_masuk'
    ];

    public function buku(){
        return $this -> belongsTo(Buku::class, 'id_buku');
    }

    public function pustakawan(){
        return $this -> belongsTo(Pustakawan::class, 'id_pustakawan');
    }

}
