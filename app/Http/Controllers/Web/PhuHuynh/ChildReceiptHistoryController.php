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
        $data = Arr::except($request->all(), ['_token']);
        dd($data);
        $findReceip= ChildReceiptHistory::where('kid_id', $request->get('kid_id'))->where('date',$request->get('date'))->get();
        $attendance = Attendance::where('kid_id', $request->get('kid_id'))->where('date',$request->get('date'))->where('status','1')->first();
        if(empty($attendance)){
             $request->session()->flash('receip', 'error1');
        }else{
            if(count($findReceip)==0){
                $data = Arr::except($request->all(), ['_token']);
        dd($data);

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
                $request->session()->flash('receip', 'success');
            }else{
                $request->session()->flash('receip', 'error');
            }
        }
        return redirect()->route('phu-huynh.dang-ki-don.lich-su', ['id' => session('id_kid_default')]);
    }
    public function lich_su_dang_ki_don()
    {
        $ChildReceiptHistorys = ChildReceiptHistory::where('kid_id', session('id_kid_default'))->get();
        return view('staff.phu-huynh.dang-ki-don.lich-su-dang-ki-don', ['ChildReceiptHistorys' => $ChildReceiptHistorys]);
    }
}