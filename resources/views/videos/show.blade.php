@extends('layouts.app')

@section('content')
    <h1>{{ $video->name }}</h1>
    <video src="{{ asset('storage/' . $video->video) }}" controls></video>
    <p>
        <a href="{{ route('video.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
        </form>
    </p>
@endsection
