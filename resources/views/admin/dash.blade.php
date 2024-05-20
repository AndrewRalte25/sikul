<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 d-md-block text-white sidebar" style="background-color: #08080ac7;">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/adminstudent">
                                <i class="bi bi-book"></i> STUDENTS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/adminteacher">
                                <i class="bi bi-person"></i> TEACHERS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/adminusers">
                                <i class="bi bi-people"></i> USERS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/adminclass">
                                <i class="bi bi-house-door"></i> CLASS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/adminpayment">
                                <i class="bi bi-coin"></i> PAYMENT
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/adminadmission">
                                <i class="bi bi-shield-check"></i> ADMISSION
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10">
                     <!-- Pie Charts -->
                     <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    User Distribution
                                </div>
                                <div class="card-body">
                                    <canvas id="chart1" style="width: 250px; height: 250px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Admission Status
                                </div>
                                <div class="card-body">
                                    <canvas id="chart2" style="width: 250px; height: 250px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Histogram Chart -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Histogram
                                </div>
                                <div class="card-body">
                                    <canvas id="histogramChart" style="height: 150px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>

    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script to render charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pie Chart 1
            var ctx1 = document.getElementById('chart1').getContext('2d');
            var chart1 = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['Science', 'Commerce', 'Arts'],
                    datasets: [{
                        label: 'User Distribution',
                        data: [120, 150, 100],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true
                }
            });

            // Pie Chart 2
            var ctx2 = document.getElementById('chart2').getContext('2d');
            var chart2 = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Paid', 'Pending', 'Overdue'],
                    datasets: [{
                        label: 'Admission Status',
                        data: [200, 50, 20],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true
                }
            });

            // Histogram Chart
            var ctx3 = document.getElementById('histogramChart').getContext('2d');
            var histogramChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Revenue',
                        data: [10000, 20000, 30000, 40000, 50000, 60000, 70000],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
