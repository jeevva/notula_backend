<?php

namespace App\Http\Controllers\Api;
use App\Notes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotesController extends Controller
{
    // Create Notula
    public function create(Request $request){

        $notes = new Notes;
        $notes->user_id = Auth::user()->id;
        $notes->title = $request->title;
        $notes->note = $request->note;


        //mistake
        $notes->save();
        $notes->user;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'notes' => $notes
        ]);
    }
    //all meetings
    public function notes(){
        $notes = Notes::orderBy('created_at','desc')->get();
        foreach($notes as $notes){

            $notes->user;


        }

        return response()->json([
            'success' => true,
            'notes' => $notes
        ]);
    }



    public function editNotes($nid){
        $notes = Notes::where('user_id',Auth::user()->id)->where('id',$nid)->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'notes' => $notes,
            'user' => $user
        ]);

    }
    //spesific meetings

    public function listNotes(){
        $notes = Notes::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'notes' => $notes,
            'user' => $user
        ]);
    }


    public function detailNotes($nid){
        $notes = Notes::where('user_id',Auth::user()->id)->where('id',$nid)->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'notes' => $notes,
            'user' => $user
        ]);

    }

//update
    public function update(Request $request){
        $notes = Notes::find($request->id);

        if(Auth::user()->id != $notes->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        $notes->title = $request->title;
        $notes->note = $request->note;
        $notes->update();
        return response()->json([
            'success' => true,
            'meetings   ' => 'Notula edited'
        ]);
    }
//delete
    public function delete(Request $request){
        $notes = Notes::find($request->id);
        // check if user is editing his own post
        if(Auth::user()->id !=$notes->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        $notes->delete();
        return response()->json([
            'success' => true,
            'message' => 'notula deleted'
        ]);
    }


}
