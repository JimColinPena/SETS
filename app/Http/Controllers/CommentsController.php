<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Comment;
use App\Models\Subcomment;
use Redirect;
use View;
use Auth;
use DB;

class CommentsController extends Controller
{
    public function index(){

        $comments = DB::table('comments')
        ->leftJoin('students', 'students.id', '=' , 'comments.student_id')
        ->select('first_name','last_name','student_id','text','comments.id','comments.created_at')
        ->get();
        // $comments = Comment::all();
        // $students = student::with('comments')->get();

       return view('dashboard.comments.index',compact('comments'));
    }
     public function create()
    {
        return view('dashboard.comments.create');
    }

    public function store(Request $request)
    {
        $student = Auth::id();
        $post = Comment::create([
            'text'     =>  $request->mytext,
            'student_id'=>  $student
        ]);
        return redirect()->route('user.post');
    }

    public function delete($id)
    {
        // dd($id);
        $post = Comment::find($id);
        $post->delete();
        return redirect()->route('user.post');
    }

    public function subindex($id){
        $comments = Comment::where('id', $id)->get();
        // $subcomments = Subcomment::where('comment_id', $id)->get();
        $subcomments = DB::table('subcomments')
        ->leftJoin('students', 'students.id', '=' , 'subcomments.student_id')
        ->select('first_name','last_name','student_id','subcomments.id','text','subcomments.created_at')
        ->where('comment_id', $id)->get();
        
       return view('dashboard.comments.subindex',compact('comments', 'subcomments'));
    }

    public function subcreate($id)
    {
        $comments = Comment::where('id', $id)->get();
        return view('dashboard.comments.subcreate',compact('comments'));
    }

    public function substore(Request $request)
    {
        $student = Auth::id();
        $comment_id = $request->comment_id;
        $post = Subcomment::create([
            'comment_id' => $request->comment_id,
            'text'     =>  $request->mytext,
            'student_id'=>  $student
        ]);
        return redirect()->route('user.subpost', $comment_id);
    }

    public function subdelete($id)
    {
        // dd($id);
        $post = Subcomment::find($id);
        $post->delete();
        return redirect()->back();
    }
}
