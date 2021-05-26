<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notulas;
use App\Points;
class PointsController extends Controller
{
    //
    public function create(Request $request){

        $notula = new Points;
        $notula->user_id = Auth::user()->id;
        $notula->notula_id = $request->notula_id;
        $notula->points = $request->points;


        //mistake
        $notula->save();
        $notula->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'notula' => $notula
        ]);
    }

    // public function notulas(){

    //     $notulas = Notulas::join('meetings','meetings.id','=',    'notulas.meetings_id')->
    //     select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','meetings.date',
    //     'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title')
    //     ->where('notulas.user_id',Auth::user()->id)->orderBy('meetings.date','desc')->get();
    //     $user = Auth::user();

    //     return response()->json([
    //         'success' => true,
    //         'notulas' => $notulas,
    //         'user' => $user,
    //     ]);
    // }
    // public function points($pid){
    //     $points = Points::where('id',$pid)->get();
    //     foreach($points as $point){

    //         $point->user;
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'points' => $points
    //     ]);
    // }
        public function points(){
            $points = Points::get();
            foreach($points as $point){

                $point->user;
            }

            return response()->json([
                'success' => true,
                'points' => $points
            ]);
        }
        public function update(Request $request){
            $point = Points::find($request->id);
            // check if user is editing his own post
            // we need to check user id with post user id
            if(Auth::user()->id != $point->user_id){
                return response()->json([
                    'success' => false,
                    'message' => 'unauthorized access'
                ]);
            }
            $point->points = $request->points;

            $point->update();
            return response()->json([
                'success' => true,
                'message' => 'Point edited'
            ]);
        }
        public function delete(Request $request){
            $point = Points::find($request->id);
            // check if user is editing his own post
            if(Auth::user()->id !=$point->user_id){
                return response()->json([
                    'success' => false,
                    'message' => 'unauthorized access'
                ]);
            }

            $point->delete();
            return response()->json([
                'success' => true,
                'message' => 'point deleted'
            ]);
        }

}
