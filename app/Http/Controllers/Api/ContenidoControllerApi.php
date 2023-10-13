<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use App\Models\User;
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
    $contenidos = Contenido::orderBy('id', 'desc')->get();

    return response()->json($contenidos);
  }


  /**
   * This function get content about user by id
   * @param (int) $userId
   * @author Andres Felipe Pizo Luligo
   */
  public function contenidosByUser($userId): JsonResponse
  {
    $user = User::findOrFail($userId);
    $contenidos = $user->contenidos;

    return response()->json($contenidos);
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
      'url'        => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml',
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
  public function show($id)
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    $contenido = Contenido::findOrFail($id);

    if (!$contenido) {
      return response()->json(['error' => 'Content not found'], 404);
    }

    $contenido->update($request->all());

    return response()->json($contenido, 200);
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