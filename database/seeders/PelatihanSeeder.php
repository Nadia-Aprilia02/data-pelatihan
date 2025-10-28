<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PelatihanSeeder extends Seeder
{
    public function run(): void
    {
        $bulanList = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $metodeList = ['Online', 'Offline', 'Hybrid'];
        $skemaList = ['Kompetensi Dasar', 'Profesional', 'Ahli Madya'];
        $provinsiList = ['Jawa Timur', 'Jawa Tengah', 'DKI Jakarta', 'Sulawesi Selatan', 'Sumatera Utara'];
        $lspList = ['LSP TIK Indonesia', 'LSP Kominfo', 'LSP Profesional', 'LSP Digital'];

        for ($i = 1; $i <= 20; $i++) {
            $pendaftarL = rand(10, 100);
            $pendaftarP = rand(10, 100);
            $totalPendaftar = $pendaftarL + $pendaftarP;

            $diterimaL = rand(5, $pendaftarL);
            $diterimaP = rand(5, $pendaftarP);
            $totalDiterima = $diterimaL + $diterimaP;

            $lulusL = rand(0, $diterimaL);
            $lulusP = rand(0, $diterimaP);
            $totalLulus = $lulusL + $lulusP;

            $hadirSertifikasi = rand($totalLulus / 2, $totalLulus);
            $sertifikasiKompeten = rand($hadirSertifikasi / 2, $hadirSertifikasi);

            DB::table('pelatihans')->insert([
                'bulan' => $bulanList[array_rand($bulanList)],
                'akademi' => 'Akademi ' . Str::random(5),
                'metode' => $metodeList[array_rand($metodeList)],
                'skema_pelatihan' => $skemaList[array_rand($skemaList)],
                'lokasi_pelatihan' => 'Gedung Pelatihan ' . rand(1, 5),
                'provinsi' => $provinsiList[array_rand($provinsiList)],
                'kabupaten_kota_kampus' => 'Kota ' . Str::random(4),
                'tempat_pelatihan' => 'Tempat ' . rand(1, 10),
                'tanggal_mulai' => now()->subDays(rand(30, 180)),
                'tanggal_selesai' => now()->subDays(rand(1, 29)),
                'id_pelatihan' => 'PLT-' . Str::upper(Str::random(6)),
                'kelas' => 'Kelas ' . chr(rand(65, 70)), // A-F
                'batch' => rand(1, 5),
                'kuota' => rand(20, 200),

                'pendaftar_l' => $pendaftarL,
                'pendaftar_p' => $pendaftarP,
                'total_pendaftar' => $totalPendaftar,

                'diterima_l' => $diterimaL,
                'diterima_p' => $diterimaP,
                'total_diterima' => $totalDiterima,

                'onboarding_l' => rand(0, $diterimaL),
                'onboarding_p' => rand(0, $diterimaP),
                'total_onboarding' => rand(0, $totalDiterima),

                'lulus_l' => $lulusL,
                'lulus_p' => $lulusP,
                'total_lulus' => $totalLulus,

                'total_hadir_sertifikasi' => $hadirSertifikasi,
                'total_sertifikasi_kompeten' => $sertifikasiKompeten,

                'lsp' => $lspList[array_rand($lspList)],
                'download_data_peserta' => 'https://example.com/download/' . $i,
                'link_upload' => 'https://example.com/upload/' . $i,
                'berhak_sertifikasi' => rand(0, 1) ? 'Ya' : 'Tidak',
                'created_at' => now()->subMonths(rand(0, 11)),
                'updated_at' => now(),
            ]);
        }
    }
}
