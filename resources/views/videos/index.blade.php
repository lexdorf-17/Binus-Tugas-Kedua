@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Videos</h1>
    
    <a href="{{ route('video.create') }}" class="btn btn-primary mb-2">Upload Video</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($videos as $video)
        <div>
            <h3>{{ $video->name }}</h3>
            <video src="{{ asset('storage/' . $video->video) }}" controls></video>
            <p>
                <a href="{{ route('video.show', $video->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
                </form>
            </p>
        </div>
        <hr>
    @endforeach
@endsection
