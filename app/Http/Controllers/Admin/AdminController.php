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

  /**
   * return view home of admin
   *
   * @return void
   */
  public function admin()
  {
    return view('admin.home');
  }

  /**
   * Export pdf
   *
   * @return void
   */
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

  /**
   * Export excel
   *
   * @return void
   */
  public function exportExcelContents()
  {
    return Excel::download(new ContentsExport, 'contenidos.xlsx');
  }

  /**
   * Export pdf
   *
   * @return void
   */
  public function generatePdfUsers()
  {

    $users = User::all();

    $pdf = Pdf::loadView('admin.pdf_user', compact('users'));

    return $pdf->download('reporte-usuarios-auxilitos.pdf');
  }

  /**
   * Export excel
   *
   * @return void
   */
  public function exportExcelUsers()
  {
    return Excel::download(new UsersExport, 'usuarios.xlsx');
  }


  /**
   * Push info to view statistics
   *
   * @return void
   */
  public function estadisticas()
  {

    $monthlyProfits = $this->monthlyProfits();

    $annualProfits  = $this->annualProfits();

    $getCantUsers   = $this->getCantUsers();

    $getCantContent = $this->getCantContent();

    $payments = $this->summaryMonthlyEarnings();

    return view('admin.statistics', compact('monthlyProfits', 'annualProfits', 'getCantUsers', 'getCantContent', 'payments'));
  }

  /**
   * Get data of earning as array of price
   *
   * @return void
   */
  public function summaryMonthlyEarnings()
  {
    $currentYear = Carbon::now()->year;

    // Obtener todos los meses del año actual
    $mesesDelAnio = range(1, 12);

    // Inicializar el arreglo de ganancias mensuales con valores predeterminados de 0
    $gananciasMensuales = array_fill_keys($mesesDelAnio, 0);

    // Obtener las ganancias reales para cada mes
    $gananciasPorMes = Subscription::whereYear('created_at', $currentYear)
      ->selectRaw('MONTH(created_at) as mes, SUM(price) as ganancia')
      ->groupByRaw('MONTH(created_at)')
      ->pluck('ganancia', 'mes')
      ->all();

    // Actualizar el arreglo de ganancias mensuales con los valores reales obtenidos de la base de datos
    foreach ($gananciasPorMes as $mes => $ganancia) {
      $gananciasMensuales[$mes] = $ganancia;
    }

    // Convertir el arreglo asociativo en un arreglo indexado
    $gananciasMensuales = array_values($gananciasMensuales);

    return $gananciasMensuales;
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

  /**
   * return view change password
   *
   * @return void
   */
  public function changePassword()
  {
    return view('admin.change_password');
  }

  /**
   * verify content
   *
   * @param Request $request
   * @param Contenido $contenido
   * @return void
   */
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

  /**
   * Return all contents as number
   *
   * @return void
   */
  public function getCantContent()
  {
    return Contenido::all()->count();
  }
}
