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
        Schema::create('spl_reqs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->timestamps();
            $table->string('nama');
            $table->string('manager');
            $table->date('tanggal_lembur');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('durasi');
            $table->string('pekerjaan');
            $table->string('posisi');
            $table->enum('status', ['Menunggu Persetujuan', 'Disetujui', 'Ditolak']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spl_reqs');
    }
};
