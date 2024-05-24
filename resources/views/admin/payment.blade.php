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

           
            <!-- User Table -->
            <div class="col-md-10">
                <div class="m-3">
                    <a href="/adminaddclass" class="btn btn-primary">Add Class</a>
                </div>

                <div class="mb-3">
                    <label for="searchInput" class="form-label">Search:</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Type to search...">
                </div>
            
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Payment ID</th>
                                <th>Amount</th>
                                <th>Student Name</th>
                                <th>Student Class</th>
                                <th>Gaurdian Name</th>
                                <th>Gaurdian Email</th>
                                <th>Payed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $u)
                                <tr>
                                    
                                    <td>{{ $u->payment_id }}</td>
                                    <td>{{ $u->amount }}</td>
                                    <td>{{ $u->student_name }}</td>
                                    <td>{{ $u->student_class }}</td>
                                    <td>{{ $u->guardian_name }}</td>
                                    <td>{{ $u->guardian_email }}</td>
                                    <td>{{ $u->created_at }}</td>
                                   
                                    
                                    
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- jQuery for Filtering -->
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                const value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</x-app-layout>
