@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Add a container for the chart -->
            <div class="card mb-4">
                <div class="card-body">
                    <canvas id="myChart" height="100px"></canvas>
                </div>
            </div>

            <h1>Student List</h1>

            <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Create New Student</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Name</th>
                        <th>Quiz</th>
                        <th>Assignment</th>
                        <th>Absent</th>
                        <th>Practice</th>
                        <th>Test</th>
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
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script type="text/javascript">
    
        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};
    
        const data = {
            labels: labels,
            datasets: [{
            label: 'Total Student By Grade',
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


@endsection
