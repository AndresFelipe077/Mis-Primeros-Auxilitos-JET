<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

  public function users()
  {
    $users = User::where('name', '!=', 'Admin example')
      ->orderBy('id', 'asc')
      ->paginate(10);

    return view('admin.users', compact('users'));
  }

  public function usersAdmins()
  {
    $users = User::orderBy('id', 'asc')->where('name', 'Admin example')->paginate(10);
    return view('admin.users_admin', compact('users'));
  }

  public function destroy(User $user)
  {
    try {
      $user->delete();
      return redirect()->route('admin.users')->with('eliminar', 'ok');
    } catch (\Exception $e) {
      // Manejar el error, por ejemplo, mostrar un mensaje de error y redirigir a una página anterior
      return back()->withError('No se pudo eliminar el usuario.');
    }
  }
}
