<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meetings;
use App\Records;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Image;

class RecordsController extends Controller
{



        public function create(Request $request){
        // mistake
        $records = new Records;
        $records->user_id = Auth::user()->id;
        $records->meetings_id = $request->meetings_id;
        $records->title = $request->title;



        if($request->record != ''){
            $now = date('Y-m-d', time());
            $username= Auth::user()->name;
            $recordFile = $request->record;
            // $record = $username.'_'.$now.'_'.time().'.'.$recordFile->getClientOriginalExtension();
            $record = $username.'_'.$now.'_'.time().'.flac';
            $path = $request->file('record')->move(public_path("/storage/records/"),$record);
        //    file_put_contents('storage/records/'.$record,($recordFile));
            $records->record = $record;


        }
        //  $records->save()->limit(1);
         $records->save();

        $records->user;
        return response()->json([
            'success' => true,
            'message' => 'posted',
            'records' => $records
        ]);

    }



    public function update(Request $request){
        $records = Records::find($request->id);
        // check if user is editing his own post
        // we need to check user id with post user id
        if(Auth::user()->id != $records->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $records->title = $request->title;
        $records->update();
        return response()->json([
            'success' => true,
            'message' => 'post edited'
        ]);
    }

    public function delete(Request $request){
        $records = Records::find($request->id);
        // check if user is editing his own post
        if(Auth::user()->id !=$records->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        //check if post has pict to delete
        if($records->record != ''){
            Storage::delete('public/records/'.$records->record);
        }
        $records->delete();
        return response()->json([
            'success' => true,
            'message' => 'post deleted'
        ]);
    }


    public function records(){
        $records = Records::where('user_id',Auth::user()->id)->get();
        foreach($records as $record){

            $record->user;
        }

        return response()->json([
            'success' => true,
            'records' => $records
        ]);
    }
    public function listRecords($mid){
        $records = Records::where('user_id',Auth::user()->id)->where('meetings_id',$mid)->orderBy('id','asc')->get();
        foreach($records as $record){

            $record->user;
        }

        return response()->json([
            'success' => true,
            'records' => $records
        ]);
    }

    public function detailRecords($pid){
        $records = Records::where('user_id',Auth::user()->id)->where('id',$pid)->get();
        foreach($records as $record){

            $record->user;
        }

        return response()->json([
            'success' => true,
            'records' => $records
        ]);
    }






}
