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
                @if($remarks->isEmpty())
                    <div class="alert alert-info" role="alert">
                        No remarks available.
                    </div>
                @else
                    @foreach($remarks as $remark)
                        <div class="card mb-3">
                            <div class="card-header">{{ $remark->student->name }}</div>
                            <div class="card-body">
                                <p class="card-text">{{ $remark->created_at }}</p>
                                <p class="card-text">{{ $remark->remarks }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </main>
        </div>
    </div>
</x-app-layout>
