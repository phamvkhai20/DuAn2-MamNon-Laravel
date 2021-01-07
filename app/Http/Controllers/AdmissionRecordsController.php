<?php

namespace App\Http\Controllers;

use App\Models\AdmissionRecords;
use App\Models\Config;
use App\Models\Kid;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdmissionRecordsController extends Controller
{
    public function them_moi(Request $request)
    {
//        kid_name: kid_name,
//        nickname: nickname,
//        address: address,
//        date_of_birth: date_of_birth,
//        gender: gender,
//        grade_id: grade_id,
//        parent_name: parent_name,
//        email: email,
//        phone: phone,
//        status:status
        $content1 = str_replace('__hoTenTre__', $request->kid_name, Config::cfg('template_email_nhop_ho_so'));
        $content1 = str_replace('__tenGoiONha__', $request->nickname, $content1);
        $content1 = str_replace('__ngaySinh__', $request->date_of_birth, $content1);
        $content1 = str_replace('__gioiTinh__', $request->gender, $content1);
        $content1 = str_replace('__hienTaiDangCutruTai__', $request->address, $content1);
        $content1 = str_replace('__luaTuoi__', $request->grade_id, $content1);
        $content1 = str_replace('__hoTenPhuHuyng__', $request->parent_name, $content1);
        $content1 = str_replace('__soDienThoai__', $request->phone, $content1);
        $content1 = str_replace('__email__', $request->email, $content1);
        sendMail($request->parent_name, $request->email, Config::cfg('title_nhap_ho_so'), $content1, '');
        $data = $request->all();
        $AdmissionRecords = AdmissionRecords::create($data);
        return response()->json(
            ['data' =>   $AdmissionRecords]
        );
    }

    public function admission(Request $request)
    {
        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'status'){
                    $data['admissions'] = AdmissionRecords::where("$key","$value")->orderBy('id', 'desc')->paginate(10);
                }
                elseif($key == 'kid_name'){
                    $data['admissions'] = AdmissionRecords::where("$key",'LIKE',"%$value%")->orderBy('id', 'desc')->paginate(10);
                }

            }
        }else{
            $data['admissions'] = AdmissionRecords::orderBy('id', 'desc')->paginate(10);
        }

        return view('staff.nha-truong.quan-ly-ho-so.index', $data);
    }
    public function updateStatus(Request $request)
{
    $admission = AdmissionRecords::findOrFail($request->id);
    $admission->status = $request->status;
    $admission->save();
    if($admission->status == 1){
        $check_parent = Parents::where("phone", $admission->phone)->first();
        if ($check_parent === null) {
            $parent = new Parents();
            $parent->parent_name = $admission->parent_name;
            $parent->phone = $admission->phone;
            $parent->email = $admission->email;
            $parent->parent_status = '1';
            $parent->parent_avatar = '';
            $parent->password = bcrypt('123456');
            $parent->save();

            $kid = new Kid();
            $kid->parent_id = $parent->id;
            $kid->kid_name = $admission->kid_name;
            $kid->nickname = $admission->nickname;
            $kid->date_of_birth = $admission->date_of_birth;
            $kid->address = $admission->address;
            $kid->kid_status = '1';
            $kid->grade_id = $admission->grade_id;
            $kid->kid_avatar = '';
            $kid->description = '';
            $kid->admission_date = date("Y-m-d");;
            $kid->gender = $admission->gender;
            $kid->save();
         }
        else{
            $kid = new Kid();
            $kid->parent_id = $check_parent->id;
            $kid->kid_name = $admission->kid_name;
            $kid->nickname = $admission->nickname;
            $kid->date_of_birth = $admission->date_of_birth;
            $kid->address = $admission->address;
            $kid->kid_status = '1';
            $kid->grade_id = $admission->grade_id;
            $kid->kid_avatar = '';
            $kid->description = '';
            $kid->admission_date = date("Y-m-d");;
            $kid->gender = $admission->gender;
            $kid->save();
        }
    }

    return response()->json(['message' => 'Xác nhận thành công']);
}
}
