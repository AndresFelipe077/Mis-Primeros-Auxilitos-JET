<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'video_title' => 'required|string|max:255',
            'video_url'   => 'required|file|mimetypes:video/mp4',
            'description' => 'required|max:255',
        ]);

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
        $request->validate([
            'video_title' => 'required|string|max:255',
            'video_url'   => 'file|mimetypes:video/mp4',
            'description' => 'required|max:255',
        ]);

        // $cadena = $request->file('video_url')->getClientOriginalName();

        // $cadenaConvert = strtr($cadena, " ", "_");

        // $nombre = Str::random(10) . $cadenaConvert;

        // $fileName = $nombre;
        // $filePath = 'videos/' . $fileName;

        // $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video_url));

        // if ($isFileUploaded) {

        $video->video_title = $request->video_title;
        if ($request->has('video_url')) {
            
            if ($video->video_url != '') {
                unlink(public_path() . '/' . $video->video_url);
            }

            $file = $request->file('video_url');

            $cadena = $file->getClientOriginalName();

            $cadenaConvert = strtr($cadena, " ", "_");

            $nombre = Str::random(10) . $cadenaConvert;

            $file->move('storage/videos/', $nombre);

            $video->video_url = '/storage/videos/' . $nombre;
            // return $video;

        }
        $video->description = $request->description;

        $video->update();

        return redirect()->route('video.index')->with('ok', 'Tu video se ha creado exitosamente!!!😎');
        // }

        // return back()
        //     ->with('error', 'Ups ha ocurrido un problema 😥, intentalo nuevamente');
    }

    public function destroy(Video $video)
    {
        if (file_exists(public_path()  . $video->video_url) && $video->video_url != '') {
            unlink(public_path()  . $video->video_url);
            $video->delete();
        }
        return redirect()->route('video.index')->with('success', 'Video deleted Successfully');
    }
}
