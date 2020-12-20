<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\ChildReceiptHistory;
use Illuminate\Http\Request;

class ChildReceiptController extends Controller
{
    public function danh_sach_don_ho()
    {
        $childReceiptsIsConfirmFalse = ChildReceiptHistory::where('class_id', session('class'))->with('kid')->get();
        return view('staff.giao-vien.dang-ki-don.danh-sach', ['childReceiptsIsConfirmFalse' => $childReceiptsIsConfirmFalse]);
    }
    public function xac_nhan_don_ho(Request $request,$id)
    {
        $id_receipt=$request->confirm;
        $params= [
            'confirm'=>$id_receipt
        ];
        ChildReceiptHistory::find($id)->update($params);
        return redirect()->route('giao-vien.danh-sach-don-ho');
    }
}
