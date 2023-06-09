@extends('layouts.app')

@section('content')
<h1>Create Student</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <label for="nim">NIM:</label>
    <input type="text" name="nim" id="nim" required>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="score_quiz">Quiz Score:</label>
    <input type="number" name="score_quiz" id="score_quiz" required>

    <label for="score_assignment">Assignment Score:</label>
    <input type="number" name="score_assignment" id="score_assignment" required>

    <label for="score_absent">Absent Score:</label>
    <input type="number" name="score_absent" id="score_absent" required>

    <label for="score_practice">Practice Score:</label>
    <input type="number" name="score_practice" id="score_practice" required>

    <label for="score_test">Test Score:</label>
    <input type="number" name="score_test" id="score_test" required>

    <button type="submit">Create</button>
</form>
@endsection