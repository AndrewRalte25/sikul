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

            <!-- Main Content -->
            <main class="col-md-10">
                @foreach($assignments as $assignment)
                <div class="card mb-3">
                    <div class="card-header">
                        Assignment
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $assignment->subject->subject_name }}</h5>
                        <p class="card-text">{{ $assignment->assignment }}</p>
                        <p class="card-text">Due Date: {{ $assignment->due_date }}</p>
                        <!-- Add more details as needed -->
                    </div>
                </div>
                @endforeach
            </main>
        </div>
    </div>
</x-app-layout>
