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
        public function points(){
            $points = Points::orderBy('id','desc')->get();
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
