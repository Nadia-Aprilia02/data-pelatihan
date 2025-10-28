@extends('layout')

@section('content')
<div class="card-custom">
    <h3 class="mb-4 text-primary">Detail Pelatihan</h3>

    <table class="table table-striped">
        <tbody>
            <tr>
                <th style="width: 30%">Bulan</th>
                <td>{{ $pelatihan->bulan }}</td>
            </tr>
            <tr>
                <th>Akademi</th>
                <td>{{ $pelatihan->akademi }}</td>
            </tr>
            <tr>
                <th>Metode</th>
                <td>{{ $pelatihan->metode }}</td>
            </tr>
            <tr>
                <th>Skema Pelatihan</th>
                <td>{{ $pelatihan->skema_pelatihan }}</td>
            </tr>
            <tr>
                <th>Lokasi Pelatihan</th>
                <td>{{ $pelatihan->lokasi_pelatihan }}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td>{{ $pelatihan->provinsi }}</td>
            </tr>
            <tr>
                <th>Kabupaten/Kota/Kampus</th>
                <td>{{ $pelatihan->kabupaten_kota_kampus }}</td>
            </tr>
            <tr>
                <th>Tempat Pelatihan</th>
                <td>{{ $pelatihan->tempat_pelatihan }}</td>
            </tr>
            <tr>
                <th>Tanggal Mulai</th>
                <td>{{ $pelatihan->tanggal_mulai }}</td>
            </tr>
            <tr>
                <th>Tanggal Selesai</th>
                <td>{{ $pelatihan->tanggal_selesai }}</td>
            </tr>
            <tr>
                <th>ID Pelatihan</th>
                <td>{{ $pelatihan->id_pelatihan }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $pelatihan->kelas }}</td>
            </tr>
            <tr>
                <th>Batch</th>
                <td>{{ $pelatihan->batch }}</td>
            </tr>
            <tr>
                <th>Kuota</th>
                <td>{{ $pelatihan->kuota }}</td>
            </tr>
            <tr>
                <th>Total Pendaftar</th>
                <td>{{ $pelatihan->total_pendaftar }}</td>
            </tr>
            <tr>
                <th>Total Diterima</th>
                <td>{{ $pelatihan->total_diterima }}</td>
            </tr>
            <tr>
                <th>Total Onboarding</th>
                <td>{{ $pelatihan->total_onboarding }}</td>
            </tr>
            <tr>
                <th>Total Lulus</th>
                <td>{{ $pelatihan->total_lulus }}</td>
            </tr>
            <tr>
                <th>Total Hadir Sertifikasi</th>
                <td>{{ $pelatihan->total_hadir_sertifikasi }}</td>
            </tr>
            <tr>
                <th>Total Sertifikasi/Kompeten</th>
                <td>{{ $pelatihan->total_sertifikasi_kompeten }}</td>
            </tr>
            <tr>
                <th>LSP</th>
                <td>{{ $pelatihan->lsp }}</td>
            </tr>
            <tr>
                <th>Download Data Peserta</th>
                <td><a href="{{ $pelatihan->download_data_peserta }}" target="_blank">{{ $pelatihan->download_data_peserta }}</a></td>
            </tr>
            <tr>
                <th>Link Upload</th>
                <td><a href="{{ $pelatihan->link_upload }}" target="_blank">{{ $pelatihan->link_upload }}</a></td>
            </tr>
            <tr>
                <th>Berhak Sertifikasi</th>
                <td>{{ $pelatihan->berhak_sertifikasi }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-end mt-4">
        <a href="{{ route('pelatihans.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>
</div>
@endsection
