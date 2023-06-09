@extends('layouts.app')

@section('content')
    <h1>Upload Video</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="video">Video File</label>
            <input type="file" name="video" id="video" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
