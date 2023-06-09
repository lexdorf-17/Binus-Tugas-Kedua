@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nim">NIM:</label>
    <input type="text" name="nim" id="nim" value="{{ $student->nim }}" required>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $student->name }}" required>

    <label for="score_quiz">Quiz Score:</label>
    <input type="number" name="score_quiz" id="score_quiz" value="{{ $student->score_quiz }}" required>

    <label for="score_assignment">Assignment Score:</label>
    <input type="number" name="score_assignment" id="score_assignment" value="{{ $student->score_assignment }}" required>

    <label for="score_absent">Absent Score:</label>
    <input type="number" name="score_absent" id="score_absent" value="{{ $student->score_absent }}" required>

    <label for="score_practice">Practice Score:</label>
    <input type="number" name="score_practice" id="score_practice" value="{{ $student->score_practice }}" required>

    <label for="score_test">Test Score:</label>
    <input type="number" name="score_test" id="score_test" value="{{ $student->score_test }}" required>

    <button type="submit">Update</button>
</form>
@endsection
