<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ASSIGNMENT</div>
                    <div class="card-body">
                        <form action="/assignment/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="subject_id" class="form-label">Select Subject:</label>
                                <select class="form-select" name="subject_id" id="subject_id">
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date:</label>
                                <input type="date" class="form-control" name="due_date" id="due_date">
                            </div>
                            <div class="mb-3">
                                <label for="assignment" class="form-label">Assignment:</label>
                                <textarea class="form-control" name="assignment" id="assignment" rows="4"></textarea>
                            </div>
                         
                            <button type="submit" class="btn btn-primary">Submit Assignment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
