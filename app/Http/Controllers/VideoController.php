<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(9);
        return view('livewire.videos.video-show', compact('videos'));
    }

    public function create()
    {
        return view('livewire.videos.video-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, ['video_title' => 'required|string|max:255', 
                                    'video_url' => 'required|file|mimetypes:video/mp4']);

        $cadena = $request->file('video_url')->getClientOriginalName();

        $cadenaConvert = strtr($cadena, " ", "_");

        $nombre = Str::random(10) . $cadenaConvert;

        $fileName = $nombre;
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video_url));

        if ($isFileUploaded) {

            Video::create([
                'video_title'       => $request->video_title,
                'video_url'         => '/storage/' . $filePath,
                'description'       => $request->description,
            ]);

            return redirect()->route('video.index')->with('ok', 'Tu video se ha creado exitosamente!!!😎');

        }

        return back()
            ->with('error', 'Ups ha ocurrido un problema 😥, intentalo nuevamente');
    }

    public function edit($video)
    {
        $video = Video::find($video);
        return view('livewire.videos.video-edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $this->validate($request, ['video_title' => 'required|string|max:255', 'video_url' => 'required|file|mimetypes:video/mp4']);

        $cadena = $request->file('video_url')->getClientOriginalName();

        $cadenaConvert = strtr($cadena, " ", "_");

        $nombre = Str::random(10) . $cadenaConvert;

        $fileName = $nombre;
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video_url));

        if ($isFileUploaded) {

            $video->video_title = $request->video_title;
            $video->video_url   = '/storage/' . $filePath;
            $video->description = $request->description;
            
            $video->save();

            return redirect()->route('video.index')->with('ok', 'Tu video se ha creado exitosamente!!!😎');

        }

        return back()
            ->with('error', 'Ups ha ocurrido un problema 😥, intentalo nuevamente');

    }
    
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('video.index')->with('success', 'Video deleted Successfully');
    }
    
}
