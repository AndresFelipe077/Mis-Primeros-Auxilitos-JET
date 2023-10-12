<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    /**
     * Go to excel users view 
     * @return \Illuminate\Support\Collection
     */
    public function view(): View 
    {
        return view('admin.excel_users', [
            'users' => User::all()
        ]);
    }

}
