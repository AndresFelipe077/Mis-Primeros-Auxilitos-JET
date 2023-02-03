<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos = Video::orderBy('id', 'desc')->paginate(9);
        return view('livewire.videos.video-show', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('livewire.videos.video-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['video_title' => 'required', 'video_url' => 'required']);

        $cadena = $request->file('video_url')->getClientOriginalName();

        $cadenaConvert = strtr($cadena, " ", "_");

        $nombre = Str::random(10) . $cadenaConvert;

        $ruta = storage_path() . '\app\public\videos/' . $nombre;

        // Video::make($request->file('video_url'))->save($ruta);

        Video::create([
            'video_title'       => $request->video_title,
            'video_url'         => '/storage/videos/' . $nombre,
            'description'       => $request->description,
        ]);

        // Video::create($request->all());
        return redirect()->route('video.index')->with('ok', 'Video Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $video = Video::find($id);
        return view('video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $video = Video::find($id);
        return view('livewire.videos.video-edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, ['video_title' => 'required', 'video_url' => 'required']);
        Video::find($id)->update($request->all());
        return redirect()->route('video.index')->with('success', 'Video Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Video::find($id)->delete();
        return redirect()->route('video.index')->with('success', 'Video deleted Successfully');
    }
}
