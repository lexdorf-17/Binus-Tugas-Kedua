@extends('layouts.app')

@section('content')

<!-- Tambahkan elemen canvas -->
<canvas id="myChart" height="280" width="600"></canvas>

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

  
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
  
    const data = {
        labels: labels,
        datasets: [{
            label: 'Grafik penilaian mahasiswa',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };
  
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
  
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  
</script>
@endsection
