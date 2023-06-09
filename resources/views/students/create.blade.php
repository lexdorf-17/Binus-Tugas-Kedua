@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Student</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM:</label>
                    <input type="text" name="nim" id="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="score_quiz" class="form-label">Quiz Score:</label>
                    <input type="number" name="score_quiz" id="score_quiz" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="score_assignment" class="form-label">Assignment Score:</label>
                    <input type="number" name="score_assignment" id="score_assignment" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="score_absent" class="form-label">Absent Score:</label>
                    <input type="number" name="score_absent" id="score_absent" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="score_practice" class="form-label">Practice Score:</label>
                    <input type="number" name="score_practice" id="score_practice" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="score_test" class="form-label">Test Score:</label>
                    <input type="number" name="score_test" id="score_test" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
