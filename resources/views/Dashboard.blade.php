<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar with Charts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/js/app.js">

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <span class="hamburger text-black" id="hamburger">&#9776;</span>
            <img src="/assets/astratech.png" alt="Logo" class="logo" id="logo">
        </div>
    </nav> 

    <!-- Sidebar -->
    <div id="sidebar" class="samping">
        <nav class="nav flex-column p-3">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="nav-link" href="/logout">
                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                </a>
            </form>
    
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-grid me-2"></i> Dashboard
            </a>
            <a class="nav-link" href="/pencarian">
                <i class="bi bi-search me-2"></i> Pencarian
            </a>
        </nav>
    </div>
    

    <!-- Main Content -->
    <div id="content" class="">
        <div class="container-fluid">
            <div class="row px-2">
                <!-- Small Cards -->
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1 same-height-card">
                        <div class="card-body d-flex">
                            <div class="px-3 py-2 me-4 rounded align-self-center bg-primary text-white">
                                <!-- Icon Section -->
                                <i class="fas fa-chart-line fs-3"></i> <!-- Replace this with the correct icon library if needed -->
                            </div>
                            <div>
                                <h5 class="fw-bold">Kehadiran Karyawan Kemarin</h5>
                                <h3 class="fw-bold">{{ $counting->countKehadiranKemarin }}</h3>
                            </div>
                        </div>
                    </div>
                </div>                         
                
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1 same-height-card">
                        <div class="card-body d-flex">
                            <div class="px-3 py-2 me-4 rounded align-self-center bg-primary text-white">
                                <!-- Icon Section -->
                                <i class="fa-solid fa-users fs-3"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Total Karyawan</h5>
                                <h3 class="fw-bold">{{ $counting->countTotalKaryawan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1 same-height-card">
                        <div class="card-body d-flex">
                            <div class="px-3 py-2 me-4 rounded align-self-center bg-primary text-white">
                                <!-- Icon Section -->
                                <i class="fa-solid fa-user fs-3"></i> <!-- Replace this with the correct icon library if needed -->
                            </div>
                            <div>
                                <h5 class="fw-bold">Karyawan Mendekati Masa Pensiun</h5>
                                <h3 class="fw-bold">{{ $counting->countKaryawanMendekatiPensiun }}</h3>
                            </div>
                        </div>
                    </div>
                </div>     
                
                <!-- Kehadiran Chart -->
                <div class="col-lg-12 col-md-12 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1">
                        <div class="d-flex justify-content-end mb-4">
                            <button
                                type="button"
                                class="btn btn-primary dropdown-toggle px-4 border-start"
                                title="Saring atau Urutkan Data"
                                data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"
                            >
                                <i class="bi bi-funnel"></i>
                            </button>
                            <div class="dropdown-menu p-4" style="width: 350px">
                                <div class="mb-3">
                                    <label for="filterJenisKehadiran" class="form-label fw-bold">Jenis Kehadiran</label>
                                    <select id="filterJenisKehadiran" class="form-select">
                                        <option value="Departemen">Departemen</option>
                                        <option value="Periode">Periode</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="filterPeriodeKehadiran" class="form-label fw-bold">Periode Kehadiran</label>
                                    <select name="filterPeriodeKehadiran" class="form-select">
                                        <option value="1">Bulanan</option>
                                        <option value="2">Mingguan</option>
                                        <option value="3">Harian</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="dtTanggalMulai" class="form-label fw-bold">Tanggal Mulai</label>
                                    <input type="date" name="dtTanggalMulai" id="dtTanggalMulai" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="dtTanggalAkhir" class="form-label fw-bold">Tanggal Akhir</label>
                                    <input type="date" name="dtTanggalAkhir" id="dtTanggalAkhir" class="form-control">
                                </div>
                                <button type="button" class="btn btn-success">Cari Data</button>
                            </div>
                        </div>
                        <canvas id="KehadiranChart" class="chart-canvas" style="height: 400px"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1">
                        <!-- Filter Dropdown di kanan atas -->
                        <div class="d-flex justify-content-end mb-4">
                            <button
                                type="button"
                                class="btn btn-primary dropdown-toggle px-4 border-start"
                                title="Saring atau Urutkan Data"
                                data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"
                            >
                                <i class="bi bi-funnel"></i>
                            </button>
                            <div class="dropdown-menu p-4" style="width: 350px">
                                <div class="mb-3">
                                    <label for="filterJenis" class="form-label fw-bold">Jenis Data</label>
                                    <select id="filterJenis" class="form-select">
                                        <option value="Gender">Gender</option>
                                        <option value="Jabatan">Jabatan</option>
                                        <option value="Usia">Usia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart / Donut Chart -->
                        <canvas id="PieChart" class="chart-canvas" style="height: 400px"></canvas>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1">
                        <!-- Filter Dropdown di kanan atas -->
                        <div class="d-flex justify-content-end mb-4">
                            <button
                                type="button"
                                class="btn btn-primary dropdown-toggle px-4 border-start"
                                title="Saring atau Urutkan Data"
                                data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"
                            >
                                <i class="bi bi-funnel"></i>
                            </button>
                            <div class="dropdown-menu p-4" style="width: 350px">
                                <div class="mb-3">
                                    <label for="filterJeniskaryawan" class="form-label fw-bold">Jenis Data</label>
                                    <select id="filterJeniskaryawan" class="form-select">
                                        <option value="Kualifikasi">Kualifikasi</option>
                                        <option value="Jabatan">Jabfung</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <canvas id="BarChartKaryawan" class="chart-canvas1" style="height: 400px"></canvas>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mt-4">
                    <div class="card shadow-lg border-0 px-2 py-1 mb-4">
                        <div class="card-body">
                            <canvas id="DepartemenChart" style="height: 400px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Jika session untuk login berhasil ada -->
        @if(session('success'))
        <script>
            // Menampilkan SweetAlert2 setelah login berhasil
            Swal.fire({
                icon: 'success',
                title: 'Selamat datang, {{ session('user') }}',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @elseif(session('error'))
        <script>
            // Menampilkan SweetAlert2 jika login gagal
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        const departemenJSON = @json($departemen);
        const genderJSON = @json($gender);
        const jabatanJSON = @json($jabatan);
        const jafungJSON = @json($jafung);
        const kualifikasiJSON = @json($kualifikasi);
        const usiaJSON = @json($usia);
        const kehadiranDepartemenJSON = @json($kehadiranDepartemen);

        console.log(departemenJSON); // Tambahkan ini untuk memeriksa data di konsol
    // console.log(genderJSON);
    // console.log(jabatanJSON);
    console.log(jafungJSON);
    console.log(kualifikasiJSON);
    // console.log(usiaJSON);
    // console.log(kehadiranDepartemenJSON);

        const departemenList = kehadiranDepartemenJSON.map(item => item["DEPARTEMEN"]);
        const kehadiranList = kehadiranDepartemenJSON.map(item => item["PERSENTASE KEHADIRAN"]);

        document.getElementById('hamburger').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const hamburger = document.getElementById('hamburger');
            const logo = document.getElementById('logo');

            sidebar.classList.toggle('active');
            content.classList.toggle('active');
            hamburger.classList.toggle('active');
            logo.classList.toggle('active');
        });

        // Kehadiran Karyawan Chart Data
        const dataKehadiranChart = {
            labels: departemenList,
            datasets: [{
                label: "Persentase",
                data: kehadiranList,
                backgroundColor: "blue",
                borderColor: "blue",
                tension: 0.4,
            }],
        };
        
        const optionsKehadiran = {
            responsive: true, // Responsif secara otomatis
            maintainAspectRatio: false, // Jangan paksa rasio aspek 
            plugins: {
            title: {
                display: true,
                text: "Tingkat Kehadiran Karyawan Sebulan Terakhir (%)",
                color: "black",
                font: {
                size: "20px",
                weight: "bold",
                family: "Barlow",
                },
            },
            },
            interaction: {
            intersect: false,
            mode: "index",
            },
            scales: {
            x: {
                display: true,
            },
            y: {
                display: true,
                // min: 0, // Mulai dari 0%
                // max: 100, // Batas maksimum 100%
                ticks: {
                callback: function(value) {
                    return value + "%"; // Menampilkan angka dalam persen
                }
                }
            },
            },
        };

        // Create Kehadiran Karyawan chart
        const AttendanceChartElement = document.getElementById('KehadiranChart').getContext('2d');
        new Chart(AttendanceChartElement, {
            type: 'bar',
            data: dataKehadiranChart,
            options: optionsKehadiran,
        });

        // Initial dummy data for chart
        // const dataGender = [50, 50]; // Dummy data for Gender
        const dataJabatan = [20, 30, 25, 15, 5, 5]; // Dummy data for Jabatan
        // const dataUsia = [10, 15, 20, 10, 5, 10, 30]; // Dummy data for Usia

        let filterJenis = 'Gender'; // Initial filter value
        const PieChartElement = document.getElementById('PieChart').getContext('2d');
        let chart = new Chart(PieChartElement, {
            type: 'doughnut',
            data: getChartData(),
            options: getChartOptions()
        });

        // Event listener to update chart when filter is changed
        document.getElementById('filterJenis').addEventListener('change', function () {
            filterJenis = this.value;
            chart.data = getChartData();
            chart.options = getChartOptions();
            chart.update();
        });

        // Function to get chart data based on filter
        function getChartData() {
            if (filterJenis === "Gender") {
                return {
                    labels: Object.keys(genderJSON),
                    // labels: ["a", "b", "c", "d", "e", "f"],
                    datasets: [{
                        data: Object.values(genderJSON),
                        // data: dataJabatan,
                        backgroundColor: ["#36A2EB", "#FF6384"],
                        borderWidth: 2,
                        cutout: "70%" // Donut chart
                    }]
                };
            } else if (filterJenis === "Jabatan") {
                return {
                    labels: Object.keys(jabatanJSON),
                    datasets: [{
                        data: Object.values(jabatanJSON),
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#4BC0C0",
                            "#9966FF",
                            "#C9CBCF",
                        ],
                        borderWidth: 2,
                        cutout: "70%" // Donut chart
                    }]
                };
            } else if (filterJenis === "Usia") {
                return {
                    labels: Object.keys(usiaJSON),
                    datasets: [{
                        data: Object.values(usiaJSON),
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#4BC0C0",
                            "#9966FF",
                            "#FF9F40",
                            "#C9CBCF",
                        ],
                        borderWidth: 2,
                        cutout: "70%" // Donut chart
                    }]
                };
            }
            return {};
        }

        // Function to get chart options based on filter (Updated for percentages)
        function getChartOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: filterJenis === "Gender" ? "Gender Karyawan" :
                            filterJenis === "Usia" ? "Usia Karyawan" :
                            filterJenis === "Jabatan" ? "Jabatan Karyawan" : "",
                        color: "black",
                        font: {
                            size: '20px',
                            weight: "bold",
                            family: "Barlow",
                        },
                        padding: { top: -3, bottom: 10 }
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            color: "black",
                            font: { size: 14 }
                        }
                    },
                    datalabels: {
                        color: "black",
                        font: { weight: "bold", size: 14 },
                        formatter: (value, context) => {
                            const data = context.chart.data.datasets[0].data;
                            const total = data.reduce((sum, val) => sum + (val || 0), 0);
                            if (total === 0) return "0%";  // If no data
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${percentage}%`; // Correct template literal syntax
                        },
                        anchor: "center", // Centered label
                        align: "center" // Centered label alignment
                    }
                },
            };
        }

        // Data Kualifikasi dan Jabatan
        // const dataKualifikasi = {
        //     labels: ['D4', 'S1', 'D3', 'SMA/K'],
        //     data: [10, 50, 30, 10],
        //     title: "Jumlah"
        // };

        // const dataJabfung = {
        //     labels: ['Dosen', 'Asisten Ahli', 'Lektor', 'Guru Besar'],
        //     data: [20, 35, 25, 20],
        //     title: "Jumlah"
        // };

        let filterJeniskaryawan = "Kualifikasi";

        const getChartOptionsKaryawan = {
            responsive: true, // Responsif secara otomatis
            maintainAspectRatio: false, // Jangan paksa rasio aspek 
            plugins: {
            title: {
                display: true,
                text: filterJeniskaryawan === "Kualifikasi" ? "Kualifikasi Karyawan" : "Jabatan Fungsional",
                color: "black",
                font: {
                size: "20px",
                weight: "bold",
                family: "Barlow",
                },
            },
            },
            interaction: {
            intersect: false,
            mode: "index",
            },
            scales: {
            x: {
                display: true,
            },
            y: {
                display: true,
                // min: 0, // Mulai dari 0%
                // max: 100, // Batas maksimum 100%
                ticks: {
                    stepSize: 2, // Mengatur agar nilai sumbu Y menjadi 0, 2, 4, 6, dst.
                },
            },
            },
        };

        const canvasKaryawan = document.getElementById('BarChartKaryawan').getContext('2d');
        // Inisialisasi Chart
        let chartKaryawan = new Chart(canvasKaryawan, {
            type: 'bar',
            data: getChartDataKaryawan(),
            options: getChartOptionsKaryawan
        });

        // Event listener untuk update chart saat filter diubah
        document.getElementById('filterJeniskaryawan').addEventListener('change', function () {
            filterJeniskaryawan = this.value;
            chartKaryawan.destroy();
            chartKaryawan = new Chart(canvasKaryawan, {
                type: 'bar',
                data: getChartDataKaryawan(),
                options: getChartOptionsKaryawan
                });
        });

        // Fungsi mendapatkan data grafik berdasarkan filter
        function getChartDataKaryawan() {
            return {
                labels: filterJeniskaryawan === "Kualifikasi" ? Object.keys(kualifikasiJSON) : Object.keys(jafungJSON),
                datasets: [{
                    label: "Jumlah",
                    data: filterJeniskaryawan === "Kualifikasi" ? Object.values(kualifikasiJSON) : Object.values(jafungJSON),
                    backgroundColor: "rgba(13, 110, 253, 0.4)",
                    borderColor: "rgba(13, 110, 253, 0.8)",
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                }]
            };
        }

        // Fungsi mendapatkan opsi grafik
        // function getChartOptionsKaryawan() {
        //     return {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         plugins: {
        //             title: {
        //                 display: true,
        //                 text:
        //                 filterJeniskaryawan === "Kualifikasi"
        //                     ? "Kualifikasi Karyawan"
        //                     : "Jabatan Fungsional",
        //                 color: "black",
        //                 font: {
        //                 size: "20px",
        //                 weight: "bold",
        //                 family: "Barlow",
        //                 },
        //             },
        //         },
        //         interaction: {
        //         intersect: false,
        //         mode: "index",
        //         },
        //         scales: {
        //             x: {
        //                 display: true,
        //             },
        //             y: {
        //                 display: true,
        //                 min: 0, // Pastikan sumbu Y selalu mulai dari 0
        //                 max: dataJenisChart2()?.yAxisMax || 10, // Gunakan nilai maksimum dari chart, default ke 10 jika data tidak ada
        //                 ticks: {
        //                 stepSize: 2, // Mengatur agar nilai sumbu Y menjadi 0, 2, 4, 6, dst.
        //                 },
        //             },
        //         },
        //     };
        // }

        

        const canvas2 = document.getElementById('DepartemenChart').getContext('2d');
        // === Chart Kedua (Departemen - 20 Bar) ===
        // const labelsDepartemen = [
        //     "HR", "Finance", "IT", "Marketing", "Sales", "Logistik", "Produksi",
        //     "R&D", "QA", "Customer Service", "Administrasi", "Legal", "Engineering",
        //     "Design", "Procurement", "Training", "Compliance", "Support", "Security", "Operations"
        // ];
        // const dataDepartemen2 = Array.from({ length: 20 }, () => Math.floor(Math.random() * 100));

        const dataDepartemen2Chart = {
            labels: Object.keys(departemenJSON),
            datasets: [{
                label: "Jumlah",
                data: Object.values(departemenJSON),
                backgroundColor: "rgba(13, 110, 253, 0.4)",
                borderColor: "rgba(13, 110, 253, 0.8)",
                borderWidth: 2,
                borderRadius: 5,
                borderSkipped: false,
            }]
        };

        const optionsDepartemenChart = {
            responsive: true, 
            maintainAspectRatio: false, 
            plugins: {
                title: {
                    display: true,
                    text: "Jumlah Karyawan Berdasarkan Departemen",
                    color: "black",
                    font: {
                    size: "20px",
                    weight: "bold",
                    family: "Barlow",
                    },
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                x: {
                    display: true,
                    title: {
                    display: true,
                    color: "black",
                    font: {
                        size: 16,
                        family: "Barlow",
                    },
                    },
                },
                y: {
                    display: true,
                    title: {
                    display: true,
                    text: "Jumlah Karyawan",
                    color: "black",
                    font: {
                        size: 16,
                        family: "Barlow",
                    },
                    },
                    min: 0,
                    ticks: {
                    stepSize: 1, // Pastikan interval selalu 1
                    precision: 0, // Paksa nilai menjadi bilangan bulat
                    },
                },
            },
        };

        // Inisialisasi Chart Departemen
        new Chart(canvas2, {
            type: 'bar',
            data: dataDepartemen2Chart,
            options: optionsDepartemenChart
        });
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Notifikasi SweetAlert -->
    @if(session('message'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('message') }}",
            icon: "success",
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif
</body>
</html>