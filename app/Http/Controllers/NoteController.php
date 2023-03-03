<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Note;

class NoteController extends Controller
{
    public function index(Request $request)
    {
            $student = Auth::id();
            $note = Note::where('student_id', $student)
                       ->get(['id', 'title', 'text', 'created_at']);
        return view('dashboard.notes.index',compact('note'));
    }

    public function create()
    {
        return view('dashboard.notes.create');
    }

    public function store(Request $request)
    {
        $student = Auth::id();
        $event = Note::create([
            'title'     =>  $request->title,
            'text'     =>  $request->mytext,
            'student_id'=>  $student
        ]);
        return redirect()->route('user.notes');
    }

    public function delete($id)
    {
        // dd($id);
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('user.notes');
    }
}