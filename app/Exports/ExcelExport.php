<?php

namespace App\Exports;

use App\Models\AdmissionRecords;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('staff.nha-truong.quan-ly-ho-so.index_hoso', [
            'posts' => AdmissionRecords::all()
        ]);

    }
}

