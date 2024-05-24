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
                                    <td>
                                        <form action="/admitfees" method="POST">
                                            @csrf
                                              <script src="https://checkout.razorpay.com/v1/checkout.js"
                                              data-key="{{ env('RAZORPAY_KEY_ID') }}"
                                              data-amount="250000"
                                              data-buttontext="Pay Fee"
                                              data-name="Admission Fee Payment"
                                              data-description="Razorpay payment"
                                              data-image="storage/logo/logo.png"
                                              data-prefill.name="{{ Auth::user()->name }}"
                                              data-prefill.email="{{ Auth::user()->email }}"
                                              data-theme.color="#ff7529">
                                          </script>
                                         <input type="hidden" name="student_name" value="{{ $student->name}}">
                                         <input type="hidden" name="student_class" value="{{ $student->class_id }}">
                                         <input type="hidden" name="student_id" value="{{ $student->user_id }}">
                                        
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Admission Fees Paid!!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
