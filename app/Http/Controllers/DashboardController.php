<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total dari data pelatihan
        $totalPendaftar = Pelatihan::sum('total_pendaftar');
        $totalDiterima = Pelatihan::sum('total_diterima');
        $totalLulus = Pelatihan::sum('total_lulus');
        $totalSertifikasi = Pelatihan::sum('total_sertifikasi_kompeten');

        // Query: ambil total per bulan (dari kolom 'bulan')
        $dataPerBulan = DB::table('pelatihans')
            ->select('bulan', DB::raw('SUM(total_pendaftar) as total'))
            ->groupBy('bulan')
            ->orderByRaw('FIELD(bulan, 
                "Januari","Februari","Maret","April","Mei","Juni",
                "Juli","Agustus","September","Oktober","November","Desember")')
            ->get();

        // Daftar bulan lengkap (agar tetap muncul meski datanya kosong)
        $semuaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Konversi hasil query ke associative array
        $dataMap = $dataPerBulan->pluck('total', 'bulan')->toArray();

        // Buat data lengkap dari Januari - Desember (isi 0 kalau gak ada)
        $bulanLabels = [];
        $totalPerBulan = [];
        foreach ($semuaBulan as $bulan) {
            $bulanLabels[] = $bulan;
            $totalPerBulan[] = $dataMap[$bulan] ?? 0; // kalau tidak ada, isi 0
        }
        // --- Data untuk chart akumulasi (Onboarding, Sertifikasi, Kuota) ---
        $dataAkumulasi = DB::table('pelatihans')
        ->select('bulan',
            DB::raw('SUM(total_onboarding) as total_onboarding'),
            DB::raw('SUM(total_sertifikasi_kompeten) as total_sertifikasi'),
            DB::raw('SUM(kuota) as total_kuota')
        )
        ->groupBy('bulan')
        ->orderByRaw('FIELD(bulan, 
            "Januari","Februari","Maret","April","Mei","Juni",
            "Juli","Agustus","September","Oktober","November","Desember")')
        ->get();

        $dataAkumulasiMap = $dataAkumulasi->keyBy('bulan');

        $onboardingPerBulan = [];
        $sertifikasiPerBulan = [];
        $kuotaPerBulan = [];

        foreach ($semuaBulan as $bulan) {
        $onboardingPerBulan[] = $dataAkumulasiMap[$bulan]->total_onboarding ?? 0;
        $sertifikasiPerBulan[] = $dataAkumulasiMap[$bulan]->total_sertifikasi ?? 0;
        $kuotaPerBulan[] = $dataAkumulasiMap[$bulan]->total_kuota ?? 0;
        }


        // Data untuk pie chart (gender)
        $totalLaki = Pelatihan::sum('pendaftar_l');
        $totalPerempuan = Pelatihan::sum('pendaftar_p');

        // === Data untuk Chart Capaian Onboarding & Sertifikasi per Akademi ===
        $dataAkademi = DB::table('pelatihans')
        ->select(
            'akademi',
            DB::raw('SUM(total_onboarding) as total_onboarding'),
            DB::raw('SUM(total_sertifikasi_kompeten) as total_sertifikasi')
        )
        ->groupBy('akademi')
        ->get();

        $akademiLabels = $dataAkademi->pluck('akademi');
        $totalOnboardingAkademi = $dataAkademi->pluck('total_onboarding');
        $totalSertifikasiAkademi = $dataAkademi->pluck('total_sertifikasi');

        // --- Data Akumulasi per Provinsi ---
        $provinsiList = ['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Bangka Belitung', 'Jambi'];

        $dataProvinsi = DB::table('pelatihans')
            ->select('provinsi',
                DB::raw('SUM(total_onboarding) as total_onboarding'),
                DB::raw('SUM(total_sertifikasi_kompeten) as total_sertifikasi')
            )
            ->whereIn('provinsi', $provinsiList)
            ->groupBy('provinsi')
            ->orderByRaw('FIELD(provinsi, "Aceh","Sumatera Utara","Sumatera Barat","Riau","Bangka Belitung","Jambi")')
            ->get();

        $provinsiLabels = $dataProvinsi->pluck('provinsi');
        $onboardingProvinsi = $dataProvinsi->pluck('total_onboarding');
        $sertifikasiProvinsi = $dataProvinsi->pluck('total_sertifikasi');

        return view('dashboard', compact(
            'totalPendaftar',
            'totalDiterima',
            'totalLulus',
            'totalSertifikasi',
            'bulanLabels',
            'totalPerBulan',
            'totalLaki',
            'totalPerempuan',
            'akademiLabels',
            'totalOnboardingAkademi',
            'totalSertifikasiAkademi',
            'onboardingPerBulan',
            'sertifikasiPerBulan',
            'kuotaPerBulan',
            'provinsiLabels',
            'onboardingProvinsi',
            'sertifikasiProvinsi'
        ));
        
    }
}
