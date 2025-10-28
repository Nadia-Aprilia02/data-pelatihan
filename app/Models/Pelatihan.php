<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan','akademi','metode','skema_pelatihan','lokasi_pelatihan','provinsi',
        'kabupaten_kota_kampus','tempat_pelatihan','tanggal_mulai','tanggal_selesai',
        'id_pelatihan','kelas','batch','kuota','pendaftar_l','pendaftar_p','total_pendaftar',
        'diterima_l','diterima_p','total_diterima','onboarding_l','onboarding_p','total_onboarding',
        'lulus_l','lulus_p','total_lulus','total_hadir_sertifikasi','total_sertifikasi_kompeten',
        'lsp','download_data_peserta','link_upload','berhak_sertifikasi'
    ];
}

