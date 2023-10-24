<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContentsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Contenido;
use App\Models\Subscription;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

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

  public function exportExcelContents()
  {
    return Excel::download(new ContentsExport, 'contenidos.xlsx');
  }

  public function generatePdfUsers()
  {

    $users = User::all();

    $pdf = Pdf::loadView('admin.pdf_user', compact('users'));

    return $pdf->download('reporte-usuarios-auxilitos.pdf');
  }

  public function exportExcelUsers()
  {
    return Excel::download(new UsersExport, 'usuarios.xlsx');
  }


  public function estadisticas()
  {

    $monthlyProfits = $this->monthlyProfits();

    $annualProfits  = $this->annualProfits();

    $getCantUsers   = $this->getCantUsers();

    $getCantContent = $this->getCantContent();

    return view('admin.statistics', compact('monthlyProfits', 'annualProfits', 'getCantUsers', 'getCantContent'));
  }

  /**
   * Calculate monthly profits
   *
   * @return void
   */
  public function monthlyProfits()
  {
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    $profits = Subscription::whereMonth('created_at', $currentMonth)
      ->whereYear('created_at', $currentYear)
      ->sum('price');

    return $profits;
  }

  /**
   * Calculate annual profits
   *
   * @return void
   */
  public function annualProfits()
  {
    $currentYear = Carbon::now()->year;

    $profits = Subscription::whereYear('created_at', $currentYear)
      ->sum('price');

    return $profits;
  }


  public function changePassword()
  {
    return view('admin.change_password');
  }

  public function contentVerified(Request $request, Contenido $contenido)
  {

    $contenido->verified = $request->verified;

    $contenido->update();

    return redirect()->route('admin.contenido')->with('verified', 'ok');
  }

  /**
   * Return all users as number
   *
   * @return void
   */
  public function getCantUsers()
  {
    $users = User::all()->count();
    return $users;
  }

  public function getCantContent()
  {
    return Contenido::all()->count();
  }

}
