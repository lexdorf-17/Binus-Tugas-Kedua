@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Student</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM:</label>
                    <input type="text" name="nim" id="nim" class="form-control" value="{{ $student->nim }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="score_quiz" class="form-label">Quiz Score:</label>
                    <input type="number" name="score_quiz" id="score_quiz" class="form-control" value="{{ $student->score_quiz }}" required>
                </div>
                <div class="mb-3">
                    <label for="score_assignment" class="form-label">Assignment Score:</label>
                    <input type="number" name="score_assignment" id="score_assignment" class="form-control" value="{{ $student->score_assignment }}" required>
                </div>
                <div class="mb-3">
                    <label for="score_absent" class="form-label">Absent Score:</label>
                    <input type="number" name="score_absent" id="score_absent" class="form-control" value="{{ $student->score_absent }}" required>
                </div>
                <div class="mb-3">
                    <label for="score_practice" class="form-label">Practice Score:</label>
                    <input type="number" name="score_practice" id="score_practice" class="form-control" value="{{ $student->score_practice }}" required>
                </div>
                <div class="mb-3">
                    <label for="score_test" class="form-label">Test Score:</label>
                    <input type="number" name="score_test" id="score_test" class="form-control" value="{{ $student->score_test }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
