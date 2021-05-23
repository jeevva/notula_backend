<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendances;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AttendancesController extends Controller
{
    // Create Notula
    public function create(Request $request){

        $attendances = new Attendances;
        $attendances->user_id = Auth::user()->id;
        $attendances->meetings_id = $request->meetings_id;
        $attendances->name = $request->name;
        $attendances->position = $request->position;



        //mistake
        $attendances->save();
        $attendances->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'attendances' => $attendances
        ]);
    }
    //

    public function update(Request $request){
        $attendances = Attendances::find($request->id);
        // check if user is editing his own post
        // we need to check user id with post user id
        if(Auth::user()->id != $attendances->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $attendances->name = $request->name;
        $attendances->position = $request->position;
        $attendances->update();
        return response()->json([
            'success' => true,
            'message' => 'Kehadiran di perbaharui'
        ]);
    }

    // public function attendances(){
    //     $attendances = Attendances::get();
    //     foreach($attendances as $attendances){

    //         $attendances->user;


    //     }

    //     return response()->json([
    //         'success' => true,
    //         'attendances' => $attendances
    //     ]);
    // }
    public function detailAttendances($aid){
        $attendances = Attendances::where('user_id',Auth::user()->id)->where('id',$aid)->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'attendances' => $attendances,
            'user' => $user
        ]);

    }
    public function listAttendances($meetingsid){
        $attendances = Attendances::where('user_id',Auth::user()->id)->where('meetings_id',$meetingsid)->orderBy('name','asc')->get();
        $user = Auth::user();
        // $meets = Db::tables('meets');
        return response()->json([
            'success' => true,
            'attendances' => $attendances,
            'user' => $user
        ]);

    }

    // delete Attendancestulas
    public function delete(Request $request){
        $attendance = Attendances::find($request->id);
        // check if user is editing his own post
        if(Auth::user()->id !=$attendance->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        $attendance->delete();
        return response()->json([
            'success' => true,
            'message' => 'notula deleted'
        ]);
    }


}
