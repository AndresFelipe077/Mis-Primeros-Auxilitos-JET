<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

  public function adminUser()
  {
    $users = User::orderBy('id', 'asc')->paginate(10);
    return view('admin.users', compact('users'));
  }

  public function destroy(User $user)
  {
    try {
      $user->delete();
      return redirect()->route('admin.user');
    } catch (\Exception $e) {
      // Manejar el error, por ejemplo, mostrar un mensaje de error y redirigir a una página anterior
      return back()->withError('No se pudo eliminar el usuario.');
    }
  }

}