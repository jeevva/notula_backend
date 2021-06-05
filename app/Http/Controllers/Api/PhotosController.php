<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meetings;
use App\picts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pictsController extends Controller
{
    public function create(Request $request){

        $photos = new Photos;
        $photos->user_id = Auth::user()->id;
        $photos->title = $request->title;

        //check if post has pict
        if($request->pict != ''){
            //choose a unique name for pict
            $pict = time().'.jpg';
            file_put_contents('storage/photos/'.$pict,base64_decode($request->pict));
            $photos->pict = $pict;
        }
        //mistake
        $photos->save();
        $photos->user;
        return response()->json([
            'success' => true,
            'message' => 'posted',
            'post' => $photos
        ]);
    }


    public function update(Request $request){
        $photos = Photos::find($request->id);
        // check if user is editing his own post
        // we need to check user id with post user id
        if(Auth::user()->id != $photos->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $photos->title = $request->title;
        $photos->update();
        return response()->json([
            'success' => true,
            'message' => 'post edited'
        ]);
    }

    public function delete(Request $request){
        $photos = Photos::find($request->id);
        // check if user is editing his own post
        if(Auth::user()->id !=$photos->user_id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        //check if post has pict to delete
        if($photos->pict != ''){
            Storage::delete('public/photos/'.$photos->pict);
        }
        $photos->delete();
        return response()->json([
            'success' => true,
            'message' => 'post deleted'
        ]);
    }

    public function posts(){
        $photoss = Photos::orderBy('id','title')->get();
        foreach($photoss as $photos){
            //get user of post
            $photos->user;
            // //comments count
            // $photos['commentsCount'] = count($photos->comments);
            // //likes count
            // $photos['likesCount'] = count($photos->likes);
            // //check if users liked his own post
            // $photos['selfLike'] = false;
            // foreach($photos->likes as $like){
            //     if($like->user_id == Auth::user()->id){
            //         $photos['selfLike'] = true;
            //     }
            }

        }

        return response()->json([
            'success' => true,
            'posts' => $photoss
        ]);
    }



    public function myPosts(){
        $photoss = Post::where('user_id',Auth::user()->id)->orderBy('id','title')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'posts' => $photoss,
            'user' => $user
        ]);
    }


}
