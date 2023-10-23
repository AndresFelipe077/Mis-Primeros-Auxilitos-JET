<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserControllerApi extends Controller
{
  private $relations;

  public function __construct()
  {
    $this->relations = [
      'contenidos'
    ];
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    return User::all();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $User
   * @return \Illuminate\Http\Response
   */
  public function show(int $userApiId)
  {
    $user = User::with($this->relations)->findOrFail($userApiId);

    return response()->json($user);
  }

  /**
   * Update user by id
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int $userId
   * @return \Illuminate\Http\Response
   */
  public function update(UserRequest $request, $userId): JsonResponse
  {

    $dataRequest = $request->validated();

    try {
      $user = User::findOrFail($userId);

      $user->update($dataRequest);

      return response()->json($user, 200);

    } catch (ValidationException $e) {

      return response()->json(['error' => $e->errors()], 400);

    } catch (\Exception $e) {

      return response()->json(['error' => 'Error interno del servidor'], 500);

    }

  }

}
