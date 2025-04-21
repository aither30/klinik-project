<div class="w-[calc(100%-5rem)] h-[calc(100%-1rem)] m-6">
    <div class="flex  w-full0">
    <div class="m-6 p-6 bg-white shadow rounded-xl h-full">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center gap-2">Obat yang Paling Sering Diresepkan
    </h2>
    <div class="relative h-64">
        <canvas id="obatResepChart" class="h-full w-full"></canvas>
    </div>
</div>


<div class="h-fit">
<div class="m-6 p-6 bg-white shadow rounded-xl h-1/2">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center gap-2">Tindakan yang Paling Sering Dilakukan
    </h2>
    <!-- Menggunakan flex dan h-auto untuk membuat chart tetap dalam ukuran yang proporsional -->
    <div class="flex flex-col h-auto">
        <canvas id="obatChart" class="h-16 w-full"></canvas>
    </div>
</div>
<div class="m-6 p-6 bg-white shadow rounded-xl">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center gap-2">Jumlah Kunjungan Pasien per Hari
    </h2>

    <div class="">
    <canvas id="kunjunganChart" class="h-20 w-full"></canvas>

    </div>
    <!-- Atur tinggi chart menggunakan height dan lebar dengan width -->
</div>
</div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctxObatResep = document.getElementById('obatResepChart').getContext('2d');

    const obatResepChart = new Chart(ctxObatResep, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($obatNames); ?>,
            datasets: [{
                label: 'Total Diresepkan',
                data: <?php echo json_encode($jumlahObat); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

<script>
    // Chart Kunjungan
    const ctx = document.getElementById('kunjunganChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tanggalList); ?>,
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: <?php echo json_encode($jumlahList); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 30,  // Batas atas grafik (maksimal 30)
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });

    // Chart Tindakan Terbanyak
    const ctx3 = document.getElementById('obatChart').getContext('2d');

    const obatChart = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($treatmentNames); ?>,  // Nama tindakan
            datasets: [{
                label: 'Jumlah Resep',
                data: <?php echo json_encode($jumlahTindakan); ?>,  // Jumlah tindakan
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
