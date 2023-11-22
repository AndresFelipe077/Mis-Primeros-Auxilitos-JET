<?php

namespace App\Exports;

use App\Models\Contenido;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ContentsExport implements FromView
{
    /**
     * Go to excel contents view 
     * @return \Illuminate\Support\Collection
     */
    public function view(): View 
    {
        return view('admin.excel_contents', [
            'contents' => Contenido::all()
        ]);
    }

}
