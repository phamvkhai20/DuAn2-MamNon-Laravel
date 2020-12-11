<?php

namespace App\Http\Controllers\Web\PhuHuynh;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\ChildReceiptHistory;
use App\Models\Kid;
use Illuminate\Http\Request;
use Arr;

class ChildReceiptHistoryController extends Controller
{
    protected function form_dang_ki()
    {
        $kid = Kid::find(session('id_kid_default'));
        return view('staff.phu-huynh.dang-ki-don.dang-ki-don', ['kid' => $kid]);
    }
    public function save_dang_ki(Request $request)
    {
        $attendance = Attendance::where('kid_id', $request->get('kid_id'))->first();
        $data = Arr::except($request->all(), ['_token']);
        $data['attendance'] = $attendance->id;
        if ($request->hasFile('image')) {
            $avatar = $request->file('image');
            $getavatar = time() . '_' . $avatar->getClientOriginalName();
            $destinationPath = public_path('upload/avatar');
            $avatar->move($destinationPath, $getavatar);
            $data['image'] = $getavatar;
        } else {

            $data['image'] = '';
        }
        ChildReceiptHistory::create($data);
        return redirect()->route('phu-huynh.dang-ki-don.lich-su', ['id' => session('id_kid_default')]);
    }
    public function lich_su_dang_ki_don()
    {
        $ChildReceiptHistorys = ChildReceiptHistory::all();
        return view('staff.phu-huynh.dang-ki-don.lich-su-dang-ki-don', ['ChildReceiptHistorys' => $ChildReceiptHistorys]);
    }
}