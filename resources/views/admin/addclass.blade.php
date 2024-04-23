<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD CLASS') }}
        </h2>

        <div class="mt-3 d-flex align-items-center justify-content-center">
            <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="container-fluid">
                        <form method="POST" action="/adminaddclass">
                            @csrf
    
                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
    
                            <button type="submit" class="btn btn-primary" style="background-color: rgb(19, 19, 18);">Add Class</button>
                            <!-- Inline style to set background color to green -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
