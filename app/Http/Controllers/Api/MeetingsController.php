<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meetings;
use App\Notulas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeetingsController extends Controller
{
    // Create Notula
    public function create(Request $request){

        $meetings = new Meetings;
        $meetings->user_id = Auth::user()->id;
        $meetings->title = $request->title;
        $meetings->agenda = $request->agenda;
        $meetings->date = $request->date;
        $meetings->location = $request->location;
        $meetings->start_time = $request->start_time;
        $meetings->end_time = $request->end_time;


        //mistake
        $meetings->save();
        $meetings->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'meetings' => $meetings
        ]);
    }
    //all meetings
    public function meetings(){
        $meetings = Meetings::orderBy('date','desc')->get();
        foreach($meetings as $meetings){

            $meetings->user;


        }

        return response()->json([
            'success' => true,
            'meetings' => $meetings
        ]);
    }



    public function editMeetings($mid){
        $meetings = Meetings::where('user_id',Auth::user()->id)->where('id',$mid)->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);

    }
    //spesific meetings
    public function myMeetings(){
        $meetings = Meetings::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);
    }

    public function detailMeetings($meetingsid){
        $meetings = Meetings::where('user_id',Auth::user()->id)->where('id',$meetingsid)->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);

    }
   //Notula by id
    public function myNotulas($meetingsid){
        $meetings = Notulas::join('meetings','meetings.id','=',    'notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','meetings.date',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title')
        ->where('notulas.user_id',Auth::user()->id)->where('notulas.meetings_id',$meetingsid)->get();

        $user = Auth::user();
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);
    }
//update
    public function update(Request $request){
        $meetings = Meetings::find($request->id);

        if(Auth::user()->id != $meetings->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        $meetings->title = $request->title;
        $meetings->agenda = $request->agenda;
        $meetings->date = $request->date;
        $meetings->start_time = $request->start_time;
        $meetings->end_time = $request->end_time;
        $meetings->location = $request->location;

        $meetings->update();
        return response()->json([
            'success' => true,
            'meetings   ' => 'Notula edited'
        ]);
    }
//delete
    public function delete(Request $request){
        $notula = Meetings::find($request->id);
        // check if user is editing his own post
        if(Auth::user()->id !=$notula->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        $notula->delete();
        return response()->json([
            'success' => true,
            'message' => 'notula deleted'
        ]);
    }


}
