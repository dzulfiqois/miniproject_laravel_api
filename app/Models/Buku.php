<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_buku',
        'jenis_buku',
        'penulis_buku',
        'penerbit_buku',
        'tahun_terbit_buku',
    ];

    public function records(){
        return $this->hasOne(Record::class);
    }
}
