<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContenidoControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenidos = Contenido::all();

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
        $contenido = Contenido::create($request->all());

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

        if(!$content) {
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

        if(!$contenido) {
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

        if($data){
            $data->delete();
        }

        return response()->json("Delete content successfully!!!");

    }
    
}
