<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notulas;
use App\Meetings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotulasController extends Controller
{
    // Create Notula
    public function create(Request $request){

        $notulas = new Notulas;
        $notulas->user_id = Auth::user()->id;
        $notulas->title = $request->title;
        $notulas->meetings_id = $request->meetings_id;



        //mistake
        $notulas->save();
        $notulas->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'notulas' => $notulas
        ]);
    }
    //
    public function update(Request $request){
        $notulas = Notulas::find($request->id);
        // check if user is editing his own post
        // we need to check user id with post user id
        if(Auth::user()->id != $notulas->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $notulas->title = $request->title;
        $notulas->update();
        return response()->json([
            'success' => true,
            'message' => 'Kehadiran di perbaharui'
        ]);
    }


    public function notulas(){

        $notulas = Notulas::join('meetings','meetings.id','=','notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','meetings.date',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title','notulas.created_at', 'notulas.updated_at')
        ->where('notulas.user_id',Auth::user()->id)->orderBy('meetings.date','desc')->get();
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'notulas' => $notulas,
            'user' => $user,
        ]);
    }
    public function notulasMeetings($mid){

        $notulas = Notulas::join('meetings','meetings.id','=',    'notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','meetings.date',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title','notulas.created_at', 'notulas.updated_at')
        ->where('notulas.user_id',Auth::user()->id)->orderBy('meetings.date','desc')->where('notulas.meetings_id',$mid)->get();
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'notulas' => $notulas,
            'user' => $user,
        ]);
    }
    public function listNotulas($mid){
        $notulas = Notulas::where('user_id',Auth::user()->id)->where('meetings_id',$mid)->orderBy('id','asc')->get();
        $user = Auth::user();
        // $meets = Db::tables('meets');
        return response()->json([
            'success' => true,
            'notulas' => $notulas,
            'user' => $user
        ]);
    }
    public function editNotulas($nid){
        $notulas = Notulas::where('user_id',Auth::user()->id)->where('id',$nid)->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'notulas' => $notulas,
            'user' => $user,
        ]);
    }
    public function detailNotulas($nid){

        $notulas = Notulas::join('meetings','meetings.id','=','notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','meetings.date',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title','notulas.created_at', 'notulas.updated_at')
        ->where('notulas.user_id',Auth::user()->id)->orderBy('meetings.date','desc')->where('notulas.id',$nid)->get();
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'notulas' => $notulas,
            'user' => $user,
        ]);
    }



    public function delete(Request $request){
        $notula = Notulas::find($request->id);
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
