<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notulas;
use App\Points;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PointsController extends Controller
{
    //
    public function create(Request $request){

        $points = new Points;
        $points->user_id = Auth::user()->id;
        $points->notulas_id = $request->notulas_id;
        $points->points = $request->points;


        //mistake
        $points->save();
        $points->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'points' => $points
        ]);
    }

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
        public function listPoints($nid){
            $points = Points::where('user_id',Auth::user()->id)->where('notulas_id',$nid)->orderBy('id','asc')->get();
            $user = Auth::user();

            return response()->json([
                'success' => true,
                'points' => $points,
                'user' => $user
            ]);
        }
        public function detailPoints($pid){
            $points = Points::where('user_id',Auth::user()->id)->where('id',$pid)->orderBy('id','asc')->get();
            $user = Auth::user();

            return response()->json([
                'success' => true,
                'points' => $points,
                'user' => $user
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
