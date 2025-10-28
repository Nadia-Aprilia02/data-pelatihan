@extends('layout')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h3 class="fw-bold text-black mb-0">Tambah Data Pelatihan</h3>
        <a href="{{ route('pelatihans.index') }}" class="btn btn-warning px-3">Kembali</a>
    </div>

    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('pelatihans.store') }}" method="POST">
            @csrf

            <div class="row g-3">

                {{-- ============ Kolom Input ============ --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Bulan</label>
                    <select name="bulan" class="form-select" required>
                        <option value="">-- Pilih Bulan --</option>
                        @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                            <option value="{{ $bulan }}">{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Akademi</label>
                    <select name="akademi" class="form-select" required>
                        <option value="">-- Pilih Akademi --</option>
                        <option value="DEA">Digital Entrepreneurship Academy</option>
                        <option value="TA">Thematic Academy</option>
                        <option value="GTA">Goverment Transformation Academy</option>
                        <option value="FGA">Fresh Graduate Academy</option>
                        <option value="VSGA">Vocational School Graduate Academy</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Metode</label>
                    <select name="metode" class="form-select" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Skema Pelatihan</label>
                    <input type="text" name="skema_pelatihan" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Lokasi Pelatihan</label>
                    <input type="text" name="lokasi_pelatihan" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Provinsi</label>
                    <select name="provinsi" class="form-select" required>
                        <option value="">-- Pilih Provinsi --</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Bangka Belitung">Bangka Belitung</option>
                        <option value="Jambi">Jambi</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kabupaten/Kota/Kampus</label>
                    <input type="text" name="kabupaten_kota_kampus" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tempat Pelatihan</label>
                    <input type="text" name="tempat_pelatihan" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">ID Pelatihan</label>
                    <input type="text" name="id_pelatihan" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kelas</label>
                    <input type="text" name="kelas" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Batch</label>
                    <input type="text" name="batch" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kuota</label>
                    <input type="number" name="kuota" class="form-control">
                </div>

                {{-- ======= Otomatis Hitung Bagian ======= --}}
                @foreach (['pendaftar', 'diterima', 'onboarding', 'lulus'] as $prefix)
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">{{ ucfirst($prefix) }} L</label>
                        <input type="number" name="{{ $prefix }}_l" class="form-control" id="{{ $prefix }}_l">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">{{ ucfirst($prefix) }} P</label>
                        <input type="number" name="{{ $prefix }}_p" class="form-control" id="{{ $prefix }}_p">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Total {{ ucfirst($prefix) }}</label>
                        <input type="number" name="total_{{ $prefix }}" class="form-control" id="total_{{ $prefix }}" readonly>
                    </div>
                @endforeach

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Total Hadir Sertifikasi</label>
                    <input type="number" name="total_hadir_sertifikasi" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Total Sertifikasi/Kompeten</label>
                    <input type="number" name="total_sertifikasi_kompeten" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">LSP</label>
                    <input type="text" name="lsp" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Download Data Peserta (URL)</label>
                    <input type="url" name="download_data_peserta" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Link Upload</label>
                    <input type="url" name="link_upload" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Berhak Sertifikasi</label>
                    <input type="text" name="berhak_sertifikasi" class="form-control">
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4 me-2">Simpan</button>
                <a href="{{ route('pelatihans.index') }}" class="btn btn-outline-danger px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

{{-- ===== Script Otomatis Hitung ===== --}}
<script>
function hitungTotal(l, p, total) {
    const valL = parseInt(document.getElementById(l)?.value) || 0;
    const valP = parseInt(document.getElementById(p)?.value) || 0;
    document.getElementById(total).value = valL + valP;
}

['pendaftar', 'diterima', 'onboarding', 'lulus'].forEach(prefix => {
    const inputL = document.getElementById(prefix + '_l');
    const inputP = document.getElementById(prefix + '_p');
    if (inputL && inputP) {
        inputL.addEventListener('input', () => hitungTotal(prefix + '_l', prefix + '_p', 'total_' + prefix));
        inputP.addEventListener('input', () => hitungTotal(prefix + '_l', prefix + '_p', 'total_' + prefix));
    }
});
</script>

{{-- ===== Styling ===== --}}
<style>
    label.form-label {
        color: #0d6efd;
        font-size: 14px;
    }

    input.form-control, select.form-select {
        border-radius: 8px;
        border: 1px solid #cfd8e3;
        font-size: 14px;
        padding: 8px 10px;
    }

    input.form-control:focus, select.form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.15rem rgba(0, 123, 255, 0.2);
    }

    .card {
        background-color: #ffffff;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }
</style>
@endsection
