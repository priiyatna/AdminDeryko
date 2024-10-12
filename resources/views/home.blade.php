@extends('layouts.app')

@section('dashboard_title', 'Dashboard/Administrator')

@section('content')

        <!-- Content Row -->
        <div class="row m-2">

            <!-- Card jumlah Produk -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white-800">50</div>
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Jumlah Produk</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card PO -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white-800">10</div>
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    PO (Purchase Order)</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card customer -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white-800">7</div>
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Customer</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Admin -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white-800">1</div>
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Admin</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Penjualan -->
            <div class="col-xl-12 mb-4">
                <div class="card shadow m-2">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary text-center">Data Penjualan per Bulan</h3>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <canvas id="salesChart" width="400" height="150"></canvas>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <canvas id="salesChart" width="400" height="150"></canvas>
                        <div class="mt-3 text-center">
                            <h5>Total Penjualan: 3000</h5>
                            <h5>Rata-rata Penjualan: 250</h5>
                            <h5>Pencapaian Target: 80%</h5>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        <!-- End of Content Wrapper -->
         

    </div>
    </div>
    </div>
    <!-- End of Page Wrapper -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line', // Tipe grafik
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Label x-axis
                datasets: [{
                    label: 'Penjualan',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    data: [120, 150, 180, 170, 220, 200, 250, 300, 280, 350, 400, 450], // Data contoh
                    fill: true,
                },
                {
                    label: 'Target Penjualan',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    data: [100, 130, 160, 150, 200, 210, 230, 300, 320, 350, 400, 500], // Data target contoh
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    </script>

@endsection
