<?php

namespace App\Http\Controllers\Web\NhaTruong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use App\Models\GradeModel;

class GradeController extends Controller
{
    public function index()
    {
        $grade = GradeModel::with(['classes' => function ($query) {
            $query->count();
        }])->get();
        return view('staff.nha-truong.quan-ly-khoi.index', compact('grade'));
    }
    public function edit($id)
    {
        $grade = GradeModel::find($id);
        return view('staff.nha-truong.quan-ly-khoi.edit', compact('grade'));
    }
    public function saveEdit(GradeRequest $req, $id)
    {
        $data = GradeModel::find($id);
        $data->grade = $req->grade;
        $data->save();
        return redirect()->route('nha-truong.khoi.index');
    }
    public function add()
    {
        $grade = GradeModel::all();
        return view('staff.nha-truong.quan-ly-khoi.add', compact('grade'));
    }
    public function saveAdd(GradeRequest $request)
    {
        $data = request()->all();
        GradeModel::create($data);
        return redirect()->route('nha-truong.khoi.index');
    }
    public function delete($id)
    {
        $grade = GradeModel::find($id);
        $grade->delete($id);
        return redirect()->back();
    }
}
