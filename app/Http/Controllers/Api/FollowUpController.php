<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notulas;
use App\FollowUp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FollowUpController extends Controller
{
    //

    //
    public function create(Request $request){

        $followup = new FollowUp;
        $followup->user_id = Auth::user()->id;
        $followup->notulas_id = $request->notulas_id;
        $followup->title = $request->title;
        $followup->pic = $request->pic;
        $followup->detail = $request->detail;
        $followup->due_date = $request->due_date;

        //mistake
        $followup->save();
        $followup->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'followup' => $followup
        ]);
    }

        public function followUp(){
            $followup = FollowUp::get();
            foreach($followup as $followups){

                $followups->user;
            }

            return response()->json([
                'success' => true,
                'followup' => $followup
            ]);
        }
        public function listFollowUp($nid){
            $followup = FollowUp::where('user_id',Auth::user()->id)->where('notulas_id',$nid)->orderBy('id','asc')->get();
            $user = Auth::user();

            return response()->json([
                'success' => true,
                'followup' => $followup,
                'user' => $user
            ]);
        }
        public function detailFollowUp($fid){
            $followup = FollowUp::where('user_id',Auth::user()->id)->where('id',$fid)->orderBy('id','asc')->get();
            $user = Auth::user();

            return response()->json([
                'success' => true,
                'followup' => $followup,
                'user' => $user
            ]);
        }
        public function update(Request $request){
            $followup = FollowUp::find($request->id);
            // check if user is editing his own post
            // we need to check user id with post user id
            if(Auth::user()->id != $followup->user_id){
                return response()->json([
                    'success' => false,
                    'message' => 'unauthorized access'
                ]);
            }

            $followup->title = $request->title;
            $followup->pic = $request->pic;
            $followup->detail = $request->detail;
            $followup->due_date = $request->due_date;

            $followup->update();
            return response()->json([
                'success' => true,
                'message' => 'Point edited'
            ]);
        }
        public function delete(Request $request){
            $followup = FollowUp::find($request->id);
            // check if user is editing his own post
            if(Auth::user()->id !=$followup->user_id){
                return response()->json([
                    'success' => false,
                    'message' => 'unauthorized access'
                ]);
            }

            $followup->delete();
            return response()->json([
                'success' => true,
                'message' => 'point deleted'
            ]);
        }
}
