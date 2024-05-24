<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 d-md-block text-white sidebar" style="background-color: #08080ac7;">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="{{ url('/teacher/' . auth()->user()->id . '/class') }}">
                                <i class="bi bi-book"></i> CLASS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/teacher/' . auth()->user()->id . '/assignment') }}">
                                <i class="bi bi-pen"></i> ASSIGNMENT
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

           
            <!-- User Table -->
            <div class="col-md-10">
                <div class="mb-3">
                    <label for="searchInput" class="form-label">Search:</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Type to search...">
                </div>
            
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Class</th>
                                <th></th>
                                <th></th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $s)
                            <tr>
                                <td>{{ $s->subject_name }}</td>
                                <td>{{ $s->class->class_name }}</td>
                                <td> <button><a href="{{ url('/teacher/' . $s->class->id . '/attendance') }}">Attendance</a></button></td>
                                <td> <button><a href="/calender">Check Attendance</a></button></td>
                                <td> <button><a href="{{ url('/teacher/' . $s->class->id . '/remarks') }}">Student Remarks</a></button></td>
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
