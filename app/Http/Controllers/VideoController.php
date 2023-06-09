<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'video' => 'required|file|mimes:mp4,mov,avi',
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        $video = Video::create([
            'name' => $validatedData['name'],
            'video' => $videoPath,
        ]);

        return redirect('/videos')->with('success', 'Video uploaded successfully!');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $video = Video::findOrFail($id);

        $video->name = $validatedData['name'];

        $video->save();

        return redirect('/videos')->with('success', 'Video updated successfully!');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        $video->delete();

        return redirect('/videos')->with('success', 'Video deleted successfully!');
    }
}
