<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContentsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Contenido;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

  public function admin()
  {
    return view('admin.home');
  }

  public function generatePdfContents()
  {
    $contents = Contenido::all();

    foreach ($contents as $content) {
      $imageUrl = $content->url;

      if (strpos($imageUrl, '/') === 0) {
        $imageUrl = substr($imageUrl, 1);
        $content->url = $imageUrl;
      }
      
    }

    $pdf = Pdf::loadView('admin.pdf_content', compact('contents'));

    // return $pdf->stream(); // view pdf in other screen
    return $pdf->download('reporte-contenido-auxilitos.pdf');

  }

  public function exportExcelContents() {
    return Excel::download(new ContentsExport, 'contenidos.xlsx');
  }

  public function generatePdfUsers()
  {
    $users = User::all();

    // foreach ($users as $user) {
    //   $imageUrl = $user->url;

    //   if (strpos($imageUrl, '/') === 0) {
    //     $imageUrl = substr($imageUrl, 1);
    //     $user->url = $imageUrl;
    //   }
      
    // }

    $pdf = Pdf::loadView('admin.pdf_user', compact('users'));

    return $pdf->download('reporte-usuarios-auxilitos.pdf');

  }

  public function exportExcelUsers() {
    return Excel::download(new UsersExport, 'usuarios.xlsx');
  }


  public function estadisticas()
  {
    return view('admin.statistics');
  }

  public function changePassword()
  {
    return view('admin.change_password');
  }

}
