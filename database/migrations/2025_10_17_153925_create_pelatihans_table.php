<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('bulan')->nullable();
            $table->string('akademi')->nullable();
            $table->string('metode')->nullable();
            $table->string('skema_pelatihan')->nullable();
            $table->string('lokasi_pelatihan')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten_kota_kampus')->nullable(); // 🔥 kolom ini wajib ada
            $table->string('tempat_pelatihan')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('id_pelatihan')->nullable();
            $table->string('kelas')->nullable();
            $table->string('batch')->nullable();
            $table->integer('kuota')->nullable();
            $table->integer('pendaftar_l')->nullable();
            $table->integer('pendaftar_p')->nullable();
            $table->integer('total_pendaftar')->nullable();
            $table->integer('diterima_l')->nullable();
            $table->integer('diterima_p')->nullable();
            $table->integer('total_diterima')->nullable();
            $table->integer('onboarding_l')->nullable();
            $table->integer('onboarding_p')->nullable();
            $table->integer('total_onboarding')->nullable();
            $table->integer('lulus_l')->nullable();
            $table->integer('lulus_p')->nullable();
            $table->integer('total_lulus')->nullable();
            $table->integer('total_hadir_sertifikasi')->nullable();
            $table->integer('total_sertifikasi_kompeten')->nullable();
            $table->string('lsp')->nullable();
            $table->string('download_data_peserta')->nullable();
            $table->string('link_upload')->nullable();
            $table->string('berhak_sertifikasi')->nullable();
            $table->timestamps();
        });
        
    }    
};
