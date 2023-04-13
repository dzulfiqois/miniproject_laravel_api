<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku', 100);
            $table->enum('jenis_buku', ['Fantasi', 'Fiksi', 'Sains', 'Religi', 'Sejarah', 'Sastra', 'Horor', 'Romansa', 'Biografi']);
            $table->string('penulis_buku', 100);
            $table->string('penerbit_buku', 100);
            $table->integer('tahun_terbit_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};
