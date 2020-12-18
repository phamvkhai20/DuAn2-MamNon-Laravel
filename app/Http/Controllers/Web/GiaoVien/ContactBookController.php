<?php

namespace App\Http\Controllers\Web\GiaoVien;

use App\Http\Controllers\Controller;
use App\Models\FormComment;
use App\Models\Kid;
use App\Models\ContactBook;
use App\Models\ReplyToComments;
use Illuminate\Http\Request;
class ContactBookController extends Controller
{
    protected function form_add_contact_book()
    {
        $formComments=FormComment::with('comment_response_forms')->get();
        $kids=Kid::where('class_id',session('class'))->get();
       return view('staff.giao-vien.so-lien-lac.them-moi',['kids'=> $kids,'formComments'=> $formComments]);
    }
    public function save_add_contact_book(Request $request){
        $formComments=FormComment::with('comment_response_forms')->get();
        $data=$request->all();
        $arrKid=$request->get('checkKid');
        $responses= $request->get('response');
        $note= $request->get('note');
        foreach($arrKid as $key=>$Kid){
             $paramContactBook=array(
                'kid_id'=>$key,
                'teacher_id'=>$request->teacher_id,
                'title'=>$request->title,
             );
             $CreateContactBook= ContactBook::create($paramContactBook);
             $idContactBook=$CreateContactBook->id;
             foreach($responses as $key=>$response){
                $contactBook = new ReplyToComments();
                $contactBook->comment_id = $key;
                $contactBook->note=$note[$key]?$note[$key]:'null';
                $contactBook->response_comment_id = $response;
                $contactBook->contact_book_id = $idContactBook;
                $CreateContactBook= $contactBook->save();
             }
        }
        $request->session()->flash('contactBook', 'success');
        $kids=Kid::where('class_id',session('class'))->get();
        return redirect()->route('giao-vien.them-so-lien-lac',['kids'=> $kids,'formComments'=> $formComments,'id'=>session('class')]);
    }
}
