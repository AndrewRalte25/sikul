<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 d-md-block text-white sidebar" style="background-color: #08080ac7;">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/admistudent">
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
                                <i class="bi bi-bookmark-check"></i> ADMISSION
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="col-md-10">
                <div class="m-3">
                    <a href="{{ url('/adminsubject/' . $class->id . '/add') }}" class="btn btn-primary">Add Subject</a>
                </div>

                <div class="mb-3">
                    <label for="searchInput" class="form-label">Search:</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Type to search...">
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subjects</th>
                                <th>Assigned Teacher</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sbj as $subject)
                                <tr>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>
                                        @php
                                            $assignedTeacher = $teachers->firstWhere('user_id', $subject->teacher_id);
                                        @endphp
                                    
                                        {{ $assignedTeacher ? $assignedTeacher->name : 'Not Assigned' }}
                                    </td>
                                    <td>
                                        <form action="{{ url('/assign/' . $subject->id . '/teacher') }}" method="POST">
                                            @csrf
                                            <select name="teacher_id">
                                                <option value="">Select Teacher</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->user_id }}">{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit">Assign Teacher</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
