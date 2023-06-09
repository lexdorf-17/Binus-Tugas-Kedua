@extends('layouts.app')

@section('content')
<h1>Student Details</h1>

<p><strong>NIM:</strong> {{ $student->nim }}</p>
<p><strong>Name:</strong> {{ $student->name }}</p>
<p><strong>Quiz Score:</strong> {{ $student->score_quiz }}</p>
<p><strong>Assignment Score:</strong> {{ $student->score_assignment }}</p>
<p><strong>Absent Score:</strong> {{ $student->score_absent }}</p>
<p><strong>Practice Score:</strong> {{ $student->score_practice }}</p>
<p><strong>Test Score:</strong> {{ $student->score_test }}</p>
<p><strong>Grade:</strong> {{ $student->grade }}</p>
@endsection