@extends('layout')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h3 class="fw-bold text-black mb-0">✏️ Edit Data Pelatihan</h3>
        <a href="{{ route('pelatihans.index') }}" class="btn btn-primary px-3">Kembali</a>
    </div>

    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('pelatihans.update', $pelatihan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                {{-- ============ Kolom Input ============ --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Bulan</label>
                    <select name="bulan" class="form-select" required>
                        <option value="">-- Pilih Bulan --</option>
                        @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                            <option value="{{ $bulan }}" {{ $pelatihan->bulan == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Akademi</label>
                    <select name="akademi" class="form-select" required>
                        <option value="">-- Pilih Akademi --</option>
                        <option value="DEA" {{ $pelatihan->akademi == 'DEA' ? 'selected' : '' }}>Digital Entrepreneurship Academy</option>
                        <option value="TA" {{ $pelatihan->akademi == 'TA' ? 'selected' : '' }}>Thematic Academy</option>
                        <option value="GTA" {{ $pelatihan->akademi == 'GTA' ? 'selected' : '' }}>Goverment Transformation Academy</option>
                        <option value="FGA" {{ $pelatihan->akademi == 'FGA' ? 'selected' : '' }}>Fresh Graduate Academy</option>
                        <option value="VSGA" {{ $pelatihan->akademi == 'VSGA' ? 'selected' : '' }}>Vocational School Graduate Academy</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Metode</label>
                    <select name="metode" class="form-select" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="Online" {{ $pelatihan->metode == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Offline" {{ $pelatihan->metode == 'Offline' ? 'selected' : '' }}>Offline</option>
                        <option value="Hybrid" {{ $pelatihan->metode == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Skema Pelatihan</label>
                    <input type="text" name="skema_pelatihan" value="{{ $pelatihan->skema_pelatihan }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Lokasi Pelatihan</label>
                    <input type="text" name="lokasi_pelatihan" value="{{ $pelatihan->lokasi_pelatihan }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Provinsi</label>
                    <select name="provinsi" class="form-select" required>
                        <option value="">-- Pilih Provinsi --</option>
                        <option value="Aceh" {{ $pelatihan->provinsi == 'Aceh' ? 'selected' : '' }}>Aceh</option>
                        <option value="Sumatera Utara" {{ $pelatihan->provinsi == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                        <option value="Sumatera Barat" {{ $pelatihan->provinsi == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                        <option value="Riau" {{ $pelatihan->provinsi == 'Riau' ? 'selected' : '' }}>Riau</option>
                        <option value="Bangka Belitung" {{ $pelatihan->provinsi == 'Bangka Belitung' ? 'selected' : '' }}>Bangka Belitung</option>
                        <option value="Jambi" {{ $pelatihan->provinsi == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kabupaten/Kota/Kampus</label>
                    <input type="text" name="kabupaten_kota_kampus" value="{{ $pelatihan->kabupaten_kota_kampus }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tempat Pelatihan</label>
                    <input type="text" name="tempat_pelatihan" value="{{ $pelatihan->tempat_pelatihan }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="{{ $pelatihan->tanggal_mulai }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ $pelatihan->tanggal_selesai }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">ID Pelatihan</label>
                    <input type="text" name="id_pelatihan" value="{{ $pelatihan->id_pelatihan }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kelas</label>
                    <input type="text" name="kelas" value="{{ $pelatihan->kelas }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Batch</label>
                    <input type="text" name="batch" value="{{ $pelatihan->batch }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kuota</label>
                    <input type="number" name="kuota" value="{{ $pelatihan->kuota }}" class="form-control">
                </div>

                {{-- ======= Bagian Total Otomatis ======= --}}
                @foreach (['pendaftar', 'diterima', 'onboarding', 'lulus'] as $prefix)
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">{{ ucfirst($prefix) }} L</label>
                        <input type="number" name="{{ $prefix }}_l" value="{{ $pelatihan[$prefix.'_l'] }}" class="form-control" id="{{ $prefix }}_l">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">{{ ucfirst($prefix) }} P</label>
                        <input type="number" name="{{ $prefix }}_p" value="{{ $pelatihan[$prefix.'_p'] }}" class="form-control" id="{{ $prefix }}_p">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Total {{ ucfirst($prefix) }}</label>
                        <input type="number" name="total_{{ $prefix }}" value="{{ $pelatihan['total_'.$prefix] }}" class="form-control" id="total_{{ $prefix }}" readonly>
                    </div>
                @endforeach

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Total Hadir Sertifikasi</label>
                    <input type="number" name="total_hadir_sertifikasi" value="{{ $pelatihan->total_hadir_sertifikasi }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Total Sertifikasi/Kompeten</label>
                    <input type="number" name="total_sertifikasi_kompeten" value="{{ $pelatihan->total_sertifikasi_kompeten }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">LSP</label>
                    <input type="text" name="lsp" value="{{ $pelatihan->lsp }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Download Data Peserta (URL)</label>
                    <input type="url" name="download_data_peserta" value="{{ $pelatihan->download_data_peserta }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Link Upload</label>
                    <input type="url" name="link_upload" value="{{ $pelatihan->link_upload }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Berhak Sertifikasi</label>
                    <input type="text" name="berhak_sertifikasi" value="{{ $pelatihan->berhak_sertifikasi }}" class="form-control">
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-warning px-4 me-2 text-white">Perbarui Data</button>
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

{{-- ===== Styling (sama seperti create.blade.php) ===== --}}
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

    .btn-warning {
        background-color: #ffc107;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }
</style>
@endsection
