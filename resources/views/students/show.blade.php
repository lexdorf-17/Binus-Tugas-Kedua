@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Details</h1>

    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>NIM:</strong> {{ $student->nim }}</p>
            <p class="card-text"><strong>Name:</strong> {{ $student->name }}</p>
            <p class="card-text"><strong>Quiz Score:</strong> {{ $student->score_quiz }}</p>
            <p class="card-text"><strong>Assignment Score:</strong> {{ $student->score_assignment }}</p>
            <p class="card-text"><strong>Absent Score:</strong> {{ $student->score_absent }}</p>
            <p class="card-text"><strong>Practice Score:</strong> {{ $student->score_practice }}</p>
            <p class="card-text"><strong>Test Score:</strong> {{ $student->score_test }}</p>
            <p class="card-text"><strong>Grade:</strong> {{ $student->grade }}</p>
        </div>
    </div>
</div>
@endsection
