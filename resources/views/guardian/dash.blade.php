<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 d-md-block text-white sidebar" style="background-color: #08080ac7;">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/guardianstudent">
                                <i class="bi bi-book"></i> STUDENT
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/guardianadmit">
                                <i class="bi bi-house-door"></i> ADMISSION
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/guardianfees">
                                <i class="bi bi-coin"></i> FEES
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10">
                <!-- Example Card 1 -->
                <div class="card mb-3">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <!-- Example Card 2 -->
                <div class="card mb-3">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <!-- Add more cards as needed -->
            </main>
        </div>
    </div>
</x-app-layout>
