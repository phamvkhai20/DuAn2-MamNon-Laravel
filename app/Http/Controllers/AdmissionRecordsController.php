<?php

namespace App\Http\Controllers;

use App\Models\AdmissionRecords;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdmissionRecordsController extends Controller
{
    public function them_moi(Request $request)
    {
        $data = $request->all();
        $AdmissionRecords = AdmissionRecords::create($data);
        return response()->json(
            ['data' =>   $AdmissionRecords]
        );
    }
}