<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ContenidoControllerApi extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $contenidos = Contenido::orderBy('id', 'desc')->where('verified', 1)->get();

    return response()->json($contenidos);
  }


  /**
   * This function get content about user by id
   * @param (int) $userId
   * @author Andres Felipe Pizo Luligo
   */
  public function myContent($userId): JsonResponse
  {
    $content = Contenido::where('user_id', $userId)->get();

    return response()->json($content, 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'title'       => 'required|max:50',
      'url'         => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml',
      'autor'       => 'string',
      'description' => 'required|max:250',
    ]);

    if ($request->hasFile('url')) {
      $cadena = $request->file('url')->getClientOriginalName();

      $cadenaConvert = strtr($cadena, " ", "_");

      $nombre = Str::random(10) . $cadenaConvert;

      $ruta = storage_path('app/public/contenidos/imagenes/') . $nombre; // Corrección en la construcción de la ruta

      Image::make($request->file('url'))
        ->resize(900, null, function ($constraint) {
          $constraint->aspectRatio();
        })
        ->save($ruta);
    }

    $title = $request->title;
    $title_url = Str::slug($title, '-');
    $slug_title_url = Str::random(1) . $title_url;

    $contenido = Contenido::create([
      'title'       => $title,
      'slug'        => $slug_title_url,
      'url'         => '/storage/contenidos/imagenes/' . $nombre, // Corrección en la ruta de almacenamiento
      'autor'       => $request->autor,
      'description' => $request->description,
      'verified'    => 0,
      'user_id'     => $request->user_id,
    ]);

    return response()->json($contenido, 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id): JsonResponse
  {
    $content = Contenido::find($id);

    if (!$content) {
      return response()->json(['error' => 'Content not found']);
    }

    return response()->json($content, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function updateContent(Request $request, $id)
  {

    /*$request->validate([
      'title'       => 'required|max:50',
      'url'         => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml',
      'autor'       => 'string',
      'description' => 'required|max:250',
    ]);*/

    try {

      $content = Contenido::findOrFail($id);

      if (!$content) {
        return response()->json(['message' => 'Content not found'], 404);
      }

      if ($request->has('url')) {

        $destination = public_path() . $content->url;

        if ($content->url != '') {
          unlink(public_path() . '/' . $content->url);
        }

        $file = $request->file('url');

        $cadena = $file->getClientOriginalName();

        $cadenaConvert = strtr($cadena, " ", "_");

        $nombre = Str::random(10) . $cadenaConvert;

        $file->move('storage/contenidos/imagenes/', $nombre);

        $content->url = '/storage/contenidos/imagenes/' . $nombre;
      }

      $title = $request->title;
      $title_url = Str::random(1) . Str::slug($title, '-');

      $name = $request->autor;
      $content->title = $title;
      $content->slug = $title_url;

      $content->autor = $name;
      $content->description = $request->description;

      $content->verified = 0;
      $content->user_id = $request->user_id;

      $content->update();

      return response()->json($content, 200);
    } catch (\Exception $e) {
      return response()->json(['error' => 'Error' . $e], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $data = Contenido::findOrFail($id);

    if ($data) {
      $data->delete();
    }

    return response()->json("Delete content successfully!!!");
  }
}
