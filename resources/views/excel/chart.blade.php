<!DOCTYPE html>
<html>
<head>
    <title>Grafik Usia</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Grafik Usia Karyawan</h1>

    <canvas id="usiaChart" width="400" height="400"></canvas>
    <script>
        const usiaCounts = @json($usiaCounts);

        const ctx = document.getElementById('usiaChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(usiaCounts),
                datasets: [{
                    data: Object.values(usiaCounts),
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#E7E9ED'
                    ],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
</body>
</html>