@extends('layout')

@section('content')

<div class="container mt-4">

    {{-- Header & Search --}}
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h3 class="fw-bold text-dark mb-0">📋 Data Pelatihan</h3>
        <div class="d-flex align-items-center gap-2">
            <input type="text" id="search" class="form-control search-box"
                   placeholder="Cari data..." style="width: 180px;">
            <a href="{{ route('pelatihans.create') }}" class="btn btn-primary px-3">+ Tambah</a>
        </div>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
            <table class="table align-middle mb-0" id="pelatihanTable">
                <thead style="background: linear-gradient(90deg, #AEE2FF 0%, #6096B4 100%); color: white; position: sticky; top: 0; z-index: 5;">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Akademi</th>
                        <th>Metode</th>
                        <th>Skema Pelatihan</th>
                        <th>Lokasi</th>
                        <th>Provinsi</th>
                        <th>Kab/Kota</th>
                        <th>Tempat</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>ID Pelatihan</th>
                        <th>Kelas</th>
                        <th>Batch</th>
                        <th>Kuota</th>
                        <th>Pendaftar L</th>
                        <th>Pendaftar P</th>
                        <th>Total Pendaftar</th>
                        <th>Diterima L</th>
                        <th>Diterima P</th>
                        <th>Total Diterima</th>
                        <th>Onboarding L</th>
                        <th>Onboarding P</th>
                        <th>Total Onboarding</th>
                        <th>Lulus L</th>
                        <th>Lulus P</th>
                        <th>Total Lulus</th>
                        <th>Total Hadir Sertifikasi</th>
                        <th>Total Sertifikasi/Kompeten</th>
                        <th>LSP</th>
                        <th>Download Data Peserta</th>
                        <th>Link Upload</th>
                        <th>Berhak Sertifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelatihans as $index => $p)
                    <tr>
                        <td class="text-center fw-semibold text-secondary">{{ $index + 1 }}</td>
                        <td>{{ $p->bulan }}</td>
                        <td>{{ $p->akademi }}</td>
                        <td>{{ $p->metode }}</td>
                        <td>{{ $p->skema_pelatihan }}</td>
                        <td>{{ $p->lokasi_pelatihan }}</td>
                        <td>{{ $p->provinsi }}</td>
                        <td>{{ $p->kabupaten_kota_kampus }}</td>
                        <td>{{ $p->tempat_pelatihan }}</td>
                        <td>{{ $p->tanggal_mulai }}</td>
                        <td>{{ $p->tanggal_selesai }}</td>
                        <td>{{ $p->id_pelatihan }}</td>
                        <td>{{ $p->kelas }}</td>
                        <td>{{ $p->batch }}</td>
                        <td>{{ $p->kuota }}</td>
                        <td>{{ $p->pendaftar_l }}</td>
                        <td>{{ $p->pendaftar_p }}</td>
                        <td>{{ $p->total_pendaftar }}</td>
                        <td>{{ $p->diterima_l }}</td>
                        <td>{{ $p->diterima_p }}</td>
                        <td>{{ $p->total_diterima }}</td>
                        <td>{{ $p->onboarding_l }}</td>
                        <td>{{ $p->onboarding_p }}</td>
                        <td>{{ $p->total_onboarding }}</td>
                        <td>{{ $p->lulus_l }}</td>
                        <td>{{ $p->lulus_p }}</td>
                        <td>{{ $p->total_lulus }}</td>
                        <td>{{ $p->total_hadir_sertifikasi }}</td>
                        <td>{{ $p->total_sertifikasi_kompeten }}</td>
                        <td>{{ $p->lsp }}</td>
                        <td>
                            @if($p->download_data_peserta)
                                <a href="{{ $p->download_data_peserta }}" class="btn btn-outline-primary btn-sm" target="_blank">Download</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($p->link_upload)
                                <a href="{{ $p->link_upload }}" class="btn btn-outline-success btn-sm" target="_blank">Upload</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $p->berhak_sertifikasi == 'Ya' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $p->berhak_sertifikasi ?? 'Belum' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('pelatihans.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('pelatihans.edit', $p->id) }}" class="btn btn-warning btn-sm me-1">✏️</a>
                            <form action="{{ route('pelatihans.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Search Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('search');
    input.addEventListener('keyup', function() {
        var value = input.value.toLowerCase();
        document.querySelectorAll('#pelatihanTable tbody tr').forEach(function(row) {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });
});
</script>

<style>
    /* ====== TABEL UTAMA ====== */
    #pelatihanTable {
        border-collapse: collapse;
        width: 100%;
        font-size: 14px;
        border-radius: 8px;
        overflow: hidden;
    }

    /* Header tabel */
    #pelatihanTable thead th {
        background-color: #48B3AF;
        color: white;
        font-weight: 600;
        padding: 10px;
        text-align: center;
        white-space: nowrap;
        position: sticky;
        top: 0;
        z-index: 5;
    }

    /* Baris tabel — bergantian warna */
    #pelatihanTable tbody tr:nth-child(odd) {
        background-color: #ffffff; /* putih */
    }

    #pelatihanTable tbody tr:nth-child(even) {
        background-color: #f2f7ff; /* biru lembut */
    }

    /* Efek hover */
    #pelatihanTable tbody tr:hover {
        background-color: #e4f0ff;
    }

    /* Garis antar sel — halus */
    #pelatihanTable th,
    #pelatihanTable td {
        border: 1px solid #e0e6ef; /* abu muda lembut */
        padding: 8px 10px;
        vertical-align: middle;
        white-space: nowrap;
    }

    /* Tampilan umum kartu dan pencarian */
    .card {
        border-radius: 10px;
        border: 1px solid #dee2e6;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .search-box {
        border-radius: 8px;
        padding: 6px 10px;
        height: 36px;
        font-size: 14px;
        border: 1px solid #ccc;
    }
</style>



@endsection
