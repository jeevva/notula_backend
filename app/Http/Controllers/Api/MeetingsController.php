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
    //
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
    public function myMeetings(){
        $meetings = Meetings::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);
    }
    // public function show_objekvalue($pid){
    //     $show=DB::table('objekvalues')->where('object_id',$pid) ->get();

    // return response([
    //     'status' => true,
    //     'message' => 'Show Objek Value',
    //     'data' => $show
    //  ], 200);


    // }
    public function detailMeetings($meetingsid){
        $meetings = Meetings::where('user_id',Auth::user()->id)->where('id',$meetingsid)->get();
        $user = Auth::user();
        // $meets = Db::tables('meets');
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);

    }
    // public function detailMeetings(Request $request){
    //     $meetings = Meetings::where('post_id',$request->id)->get();
    //     //show user of each comment
    //     foreach($meetings as $meeting){
    //         $meeting->user;
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'meetings' => $meetings
    //     ]);
    // }
    // public function detailMeetings(Request $request){
    //     $meetings = Comment::where('id',$request->id)->get();
    //     //show user of each comment
    //     foreach($meetings as $meeting){
    //         $meeting->user;
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'meetings' => $meetings
    //     ]);
    // }
    public function myNotulas($meetingsid){
        // $meets = Notulas::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        $meetings = Notulas::join('meetings','meetings.id','=',    'notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','meetings.date',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title')
        ->where('notulas.user_id',Auth::user()->id)->where('notulas.meetings_id',$meetingsid)->get();

        // ->where('meets_id',Db::tables('meets')->id)
        // ->orderBy('notulas.id','desc')

        $user = Auth::user();
        // $meets = Db::tables('meets');
        return response()->json([
            'success' => true,
            'meetings' => $meetings,
            'user' => $user
        ]);
    }

    public function update(Request $request){
        $meetings = Meetings::find($request->id);
        // check if user is editing his own post
        // we need to check user id with post user id
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

        $meetings->update();
        return response()->json([
            'success' => true,
            'meetings   ' => 'Notula edited'
        ]);
    }

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
