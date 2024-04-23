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
                            <a class="nav-link text-white" href="/adminpayment">
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
                                
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class as $u)
                                <tr>
                                    
                                    <td>{{ $u->class_name }}</td>
                                    <td>
                                      
                                        <button>
                                            <a href="{{ url('/adminclass/' . $u->id . '/view') }}">VIEW CLASS</a>
                                        </button>
                                    </td>
                                    <td>
                                        <button>
                                            <a href="{{ url('/adminspot/' . $u->id . '/edit') }}">EDIT</a>
                                        </button>
                                       
                                    </td>
                                    
                                
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
