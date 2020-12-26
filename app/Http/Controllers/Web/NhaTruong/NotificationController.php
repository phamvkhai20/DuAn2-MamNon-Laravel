<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('sender_id', 0)->orderBy('id', 'desc')->paginate(5);
        return view('staff.nha-truong.quan-ly-thong-bao.index', ['notifications' => $notifications]);
    }
    public function save_add(NotificationRequest $request)
    {
        $data = $request->all();
        if ($data['range'] == 1) {

            $parents = Parents::get('id');
            $id_parents = [];
            foreach ($parents as $key => $parent) {
                array_push($id_parents, $parent->id);
            }
            $params = [
                'title' => $data['title'],
                'range' => $data['range'],
                'note' => $data['note'],
                'sender_id' => $data['sender_id'],
                'role' => $data['role'],
                'class_id' => 0,
                'receiver_id' => '0',
            ];
        }
        if ($data['range'] == 2) {
            $params = [
                'title' => $data['title'],
                'range' => $data['range'],
                'sender_id' => $data['sender_id'],
                'role' => $data['role'],
                'note' => $data['note'],
                'class_id' => $data['class_id'],
                'receiver_id' => 0,
            ];
        }
        if ($data['range'] == 3) {
            $params = [
                'title' => $data['title'],
                'sender_id' => $data['sender_id'],
                'role' => $data['role'],
                'range' => $data['range'],
                'note' => $data['note'],
                'class_id' => 0,
                'receiver_id' => $data['receiver_id'],
            ];
        }
        $add = Notification::create($params);
        return redirect()->route('nha-truong.thong-bao.index');
    }
    public function indexTeacher()
    {
        $notifications = Notification::where('range', '3')->where('receiver_id', Auth::guard('teacher')->user()->id)->orWhere('range', '1')->orderBy('id', 'desc')->paginate(5);
        return view('staff.giao-vien.quan-ly-thong-bao.index', ['notifications' => $notifications]);
    }
    public function save_teacher_add(NotificationRequest $request)
    {
        $data = $request->all();
        if ($data['range'] == 2) {
            $params = [
                'title' => $data['title'],
                'range' => $data['range'],
                'sender_id' => $data['sender_id'],
                'role' => $data['role'],
                'note' => $data['note'],
                'class_id' => $data['class_id'],
                'receiver_id' => 0,
            ];
        }
        if ($data['range'] == 4) {
            $params = [
                'title' => $data['title'],
                'sender_id' => $data['sender_id'],
                'role' => $data['role'],
                'range' => $data['range'],
                'note' => $data['note'],
                'class_id' => 0,
                'receiver_id' => $data['receiver_id'],
            ];
        }
        $add = Notification::create($params);
        return redirect()->route('nha-truong.thong-bao.index');
    }
    public function indexParent()
    {
        // dd(Auth::guard('parent')->user()->id);
        $notifications = Notification::where('range', '4')->where('receiver_id', Auth::guard('parent')->user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('staff.phu-huynh.thong-bao.index', ['notifications' => $notifications]);
    }
    public function teacher_add()
    {
        return view('staff.giao-vien.quan-ly-thong-bao.add');
    }
    public function add()
    {
        return view('staff.nha-truong.quan-ly-thong-bao.add');
    }
    public function detail()
    {
        return view('staff.nha-truong.quan-ly-thong-bao.detail');
    }
}
