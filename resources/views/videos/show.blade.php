@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ $video->name }}</h1>
        </div>
        <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item" src="{{ asset('storage/' . $video->video) }}" controls></video>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('video.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
        </form>
    </div>
</div>
@endsection
