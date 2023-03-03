<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;


use Auth;
class EventController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $student = Auth::id();
            // dd($student);
            $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->where('student_id', $student)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('dashboard.events.index');
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->type == 'add') 
            {
                $student = Auth::id();
                // dd($student);
                $event = Event::create([
                    'title'     =>  $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end,
                    'student_id'=>  $student
                ]);

                return response()->json($event);
            }

            if($request->type == 'update')
            {
                $event = Event::find($request->id)->update([
                    'title'     =>  $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end
                ]);

                return response()->json($event);
            }

            if($request->type == 'delete')
            {
                $event = Event::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }
}
