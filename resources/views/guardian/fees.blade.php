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
              
                <div class="container mt-4">
                    <h1>Admission Fees</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                <tr>
                                    <td>{{ $student->user_id }}</td>
                                    <td>{{ $student->name }}</td>
                                    
                                    <td>Pay Fees</td>
                                  
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Admission Fees Paid!!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="container mt-4">
                    <h1>Montly Fees</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($monthly as $student)
                                <tr>
                                    <td>{{ $student->user_id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>Pay Fees</td>
                                  
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Please Complete Admission!!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
