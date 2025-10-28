<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateAkademiSeeder extends Seeder
{
    public function run()
    {
        // Daftar akademi yang diinginkan
        $akademis = ['DEA', 'TA', 'GTA', 'FGA', 'VSGA'];

        // Ambil semua id dari tabel pelatihans
        $pelatihans = DB::table('pelatihans')->select('id')->get();

        foreach ($pelatihans as $pelatihan) {
            // Pilih akademi secara acak dari daftar di atas
            $randomAkademi = $akademis[array_rand($akademis)];

            // Update kolom akademi
            DB::table('pelatihans')
                ->where('id', $pelatihan->id)
                ->update(['akademi' => $randomAkademi]);
        }

        echo "✅ Semua data akademi berhasil diperbarui!\n";
    }
}
