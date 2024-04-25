<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Remarks Form for Class: {{ $class->id }}</div>
                    <div class="card-body">
                        <form action="/teacher/remarks" method="POST">
                            @csrf
                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Select Student:</label>
                                <select class="form-select" name="student_id" id="student_id">
                                    <option value="">Select Student</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->user_id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks:</label>
                                <textarea class="form-control" name="remarks" id="remarks" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Remarks</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    