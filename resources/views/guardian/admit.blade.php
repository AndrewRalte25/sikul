<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">School Admission Form</h1>
        <form id="admissionForm" method="POST" action="/submitadmission" enctype="multipart/form-data">
            @csrf
            <!-- Personal Information -->
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
    
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
    
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
    
            <div class="form-group">
                <label for="password_confirmation">Re-enter Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
    
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
    
            <!-- Address Information -->
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
    
            <!-- Academic Information -->
            <div class="form-group">
                <label for="last_marksheet">Upload Last Exam Marksheet:</label>
                <input type="file" class="form-control-file" id="last_marksheet" name="last_marksheet">
            </div>
    
            <div class="form-group">
                <label for="class">Select Class:</label>
                <select class="form-control" id="class" name="class" required>
                    <option value="">Select</option>
                    @foreach($classs as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="guardian_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary" style="background-color: rgb(19, 19, 18)">Submit</button>
        </form>
    </div>
</x-app-layout>