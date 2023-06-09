@extends('layouts.app')

@section('content')

<!-- Tambahkan elemen canvas -->
<!-- <canvas id="gradeChart"></canvas> -->

<h1>Student List</h1>

<a href="{{ route('students.create') }}">Create New Student</a>

<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Name</th>
            <th>Quiz Score</th>
            <th>Assignment Score</th>
            <th>Absent Score</th>
            <th>Practice Score</th>
            <th>Test Score</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)

            <tr>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->score_quiz }}</td>
                <td>{{ $student->score_assignment }}</td>
                <td>{{ $student->score_absent }}</td>
                <td>{{ $student->score_practice }}</td>
                <td>{{ $student->score_test }}</td>
                <td>{{ $student->grade }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}">View</a>
                    <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    var ctx = document.getElementById('gradeChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['A', 'B', 'C', 'D', 'E'],
            datasets: [{
                label: 'Grade Distribution',
                data: [5, 10, 8, 3, 2], // Ganti dengan data grade yang sesuai
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
