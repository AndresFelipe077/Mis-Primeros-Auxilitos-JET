<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadApp extends Controller
{
  public function downloadApk()
  {
    $rutaArchivo = public_path('apk/mis-primeros-auxilitos.apk');
    return response()->download($rutaArchivo, 'mis-primeros-auxilitos.apk');
  }
}
