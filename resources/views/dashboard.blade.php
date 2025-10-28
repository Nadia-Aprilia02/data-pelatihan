@extends('layouts.app')



@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Banner Header -->
<div class="dashboard-banner">
    <div class="banner-left">
        <img src="{{ asset('img/Gambar2.png') }}" alt="Logo Kiri">
    </div>

    <h1 class="banner-title">
        REALISASI DTS BBPSDMP KOMINFO MEDAN TAHUN 2025
    </h1>

    <div class="banner-right">
        <img src="{{ asset('img/Gambar3.png') }}" alt="Logo Kanan">
    </div>
</div>

    <!-- <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Dashboard Realisasi TDS 2025</h1> -->

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-blue-100 shadow rounded-xl p-5 text-center">
            <h2 class="font-semibold text-gray-600">Total Pendaftar</h2>
            <p class="text-3xl font-bold text-blue-700">{{ $totalPendaftar }}</p>
        </div>

        <div class="bg-green-100 shadow rounded-xl p-5 text-center">
            <h2 class="font-semibold text-gray-600">Total Diterima</h2>
            <p class="text-3xl font-bold text-green-700">{{ $totalDiterima }}</p>
        </div>

        <div class="bg-cyan-100 shadow rounded-xl p-5 text-center">
            <h2 class="font-semibold text-gray-600">Total Lulus</h2>
            <p class="text-3xl font-bold text-cyan-700">{{ $totalLulus }}</p>
        </div>

        <div class="bg-yellow-100 shadow rounded-xl p-5 text-center">
            <h2 class="font-semibold text-gray-600">Total Sertifikasi Kompeten</h2>
            <p class="text-3xl font-bold text-yellow-700">{{ $totalSertifikasi }}</p>
        </div>
    </div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

    <!-- Bar Chart -->
    <div class="bg-white shadow rounded-xl p-5">
        <h6 class="font-semibold text-gray-700 mb-3 text-center">Jumlah Pendaftar per Bulan</h6>
        <div class="h-64">
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="bg-white shadow rounded-xl p-5 flex flex-col items-center justify-center">
        <h6 class="font-semibold text-gray-700 mb-3">Perbandingan Gender</h6>
        <div class="h-64 w-64 mb-4">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="flex justify-center gap-8 text-sm">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                <span>Laki-laki: <strong>{{ $totalLaki }}</strong></span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-pink-400"></span>
                <span>Perempuan: <strong>{{ $totalPerempuan }}</strong></span>
            </div>
        </div>
    </div>
</div>
<!-- Chart Capaian Onboarding & Sertifikasi per Akademi -->
<div class="bg-white shadow rounded-xl p-5 mt-5">
    <h6 class="font-semibold text-gray-700 mb-3 text-center">
        Capaian Onboarding & Sertifikasi Total per Akademi
    </h6>
    <div class="h-72">
        <canvas id="chartAkademi"></canvas>
    </div>
</div>

<!-- Bar Chart Akumulasi -->
<div class="bg-white shadow rounded-xl p-5 mt-5">
    <h6 class="font-semibold text-gray-700 mb-3 text-center">Akumulasi Total Kuota vs Total Onboarding vs Total Sertifikasi</h6>
    <div class="h-64">
        <canvas id="barChartAkumulasi"></canvas>
    </div>
</div>

<!-- Bar Chart Akumulasi Berdasarkan Provinsi -->
<div class="bg-white shadow rounded-xl p-5 mt-5">
    <h6 class="font-semibold text-gray-700 mb-3 text-center">Akumulasi Onboarding & Sertifikasi per Provinsi</h6>
    <div class="h-64">
        <canvas id="barChartProvinsi"></canvas>
    </div>
</div>

</div>


<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
    Chart.register(ChartDataLabels);

    const bulanLabels = @json($bulanLabels);
    const totalPerBulan = @json($totalPerBulan);

    const barChart = new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: bulanLabels,
        datasets: [{
            label: 'Total Pendaftar',
            data: totalPerBulan,
            backgroundColor: '#1FAB89',
            borderRadius: 6,
            barThickness: 25 
        }]
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            datalabels: {
                color: '#000',
                anchor: 'end',
                align: 'top',
                font: { weight: 'bold', size: 10 },
                formatter: (value) => value
            }
        },
        scales: {
            x: { ticks: { font: { size: 10 } } },
            y: { beginAtZero: true, ticks: { font: { size: 10 } } }
        }
    }
});

    // Pie Chart
    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [{{ $totalLaki }}, {{ $totalPerempuan }}],
                backgroundColor: ['#3B82F6', '#F472B6'],
                borderWidth: 0
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' },
                datalabels: {
                    color: '#fff',
                    font: { weight: 'bold' },
                    formatter: (value, ctx) => {
                        const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        const percentage = ((value / total) * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
            cutout: '65%'
        }
    });
        // Data akumulasi dari controller
        const onboardingPerBulan = @json($onboardingPerBulan);
        const sertifikasiPerBulan = @json($sertifikasiPerBulan);
        const kuotaPerBulan = @json($kuotaPerBulan);

        // Bar Chart Akumulasi
        const barChartAkumulasi = new Chart(document.getElementById('barChartAkumulasi'), {
            type: 'bar',
            data: {
                labels: bulanLabels,
                datasets: [
                    {
                        label: 'Total Onboarding',
                        data: onboardingPerBulan,
                        backgroundColor: '#FFEB00',
                        borderRadius: 5,
                        barThickness: 20
                    },
                    {
                        label: 'Total Sertifikasi',
                        data: sertifikasiPerBulan,
                        backgroundColor: '#D84040',
                        borderRadius: 5,
                        barThickness: 20
                    },
                    {
                        label: 'Total Kuota',
                        data: kuotaPerBulan,
                        backgroundColor: '#7BD3EA',
                        borderRadius: 5,
                        barThickness: 20
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' },
                    datalabels: {
                        color: '#000',
                        anchor: 'end',
                        align: 'top',
                        font: { weight: 'bold', size: 9 },
                        formatter: (value) => value
                    }
                },
                scales: {
                    x: { ticks: { font: { size: 9 } } },
                    y: { beginAtZero: true }
                }
            }
        });
        // === Chart Capaian Onboarding & Sertifikasi per Akademi ===
        const akademiLabels = @json($akademiLabels);
        const totalOnboardingAkademi = @json($totalOnboardingAkademi);
        const totalSertifikasiAkademi = @json($totalSertifikasiAkademi);

        const ctxAkademi = document.getElementById('chartAkademi').getContext('2d');
        const chartAkademi = new Chart(ctxAkademi, {
        type: 'bar',
        data: {
            labels: akademiLabels,
            datasets: [
                {
                    label: 'Total Onboarding',
                    data: totalOnboardingAkademi,
                    backgroundColor: '#00ADB5',
                    borderRadius: 6,
                    barThickness: 25
                },
                {
                    label: 'Total Sertifikasi Kompeten',
                    data: totalSertifikasiAkademi,
                    backgroundColor: '#FC5185',
                    borderRadius: 6,
                    barThickness: 25
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                datalabels: {
                    color: '#000',
                    anchor: 'end',
                    align: 'top',
                    font: { weight: 'bold', size: 10 },
                    formatter: (value) => value
                }
            },
            scales: {
                x: { ticks: { font: { size: 10 } } },
                y: { beginAtZero: true, ticks: { font: { size: 10 } } }
            }
        }
    });

    // Data dari controller
    const provinsiLabels = @json($provinsiLabels);
    const onboardingProvinsi = @json($onboardingProvinsi);
    const sertifikasiProvinsi = @json($sertifikasiProvinsi);

    // Bar Chart Provinsi
    const barChartProvinsi = new Chart(document.getElementById('barChartProvinsi'), {
        type: 'bar',
        data: {
            labels: provinsiLabels,
            datasets: [
                {
                    label: 'Total Onboarding',
                    data: onboardingProvinsi,
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderRadius: 5,
                    barThickness: 25
                },
                {
                    label: 'Total Sertifikasi',
                    data: sertifikasiProvinsi,
                    backgroundColor: 'rgba(234, 179, 8, 0.8)',
                    borderRadius: 5,
                    barThickness: 25
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
                datalabels: {
                    color: '#000',
                    anchor: 'end',
                    align: 'top',
                    font: { weight: 'bold', size: 9 },
                    formatter: (value) => value
                }
            },
            scales: {
                x: { ticks: { font: { size: 10 } } },
                y: { beginAtZero: true }
            }
        }
    });

</script>
@endsection
