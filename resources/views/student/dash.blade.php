<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 d-md-block text-white sidebar" style="background-color: #08080ac7;">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/studentassignment">
                                <i class="bi bi-book"></i> Assignment
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10">
                @if($assignments->isEmpty())
                    <div class="alert alert-info" role="alert">
                        No pending assignments.
                    </div>
                @else
                    @foreach($assignments as $assignment)
                    <div class="card mb-3">
                        <div class="card-header">{{ $assignment->subject->subject_name }}</div>
                        <div class="card-body">
                            <h5 class="card-title">Due Date: {{ $assignment->due_date }}</h5>
                            <p class="card-text">{{ $assignment->assignment }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </main>
        </div>
    </div>
</x-app-layout>
