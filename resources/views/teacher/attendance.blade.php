<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Attendance Form for Class: {{ $class->id }}</div>
                    <div class="card-body">
                        <form action="/teacher/attendance" method="POST">
                            @csrf
                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>
                                            <select name="attendance[{{ $student->user_id }}]">
                                                <option value="present">Present</option>
                                                <option value="absent">Absent</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Submit Attendance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
