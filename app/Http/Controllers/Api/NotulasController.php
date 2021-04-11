<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notulas;
use Illuminate\Support\Facades\Auth;

class NotulasController extends Controller
{
    //
    public function notulas(){
        $notulas = Notulas::orderBy('id','desc')->get();
        foreach($notulas as $notula){
            //get user of post
            $notula->user;
            //comments count
            // $post['commentsCount'] = count($post->comments);
            // //likes count
            // $post['likesCount'] = count($post->likes);
            // //check if users liked his own post
            // $post['selfLike'] = false;
            // foreach($post->likes as $like){
            //     if($like->user_id == Auth::user()->id){
            //         $post['selfLike'] = true;
            //     }
            // }

        }

        return response()->json([
            'success' => true,
            'notulas' => $notulas
        ]);
    }
    public function myNotulas(){
        $notulas = Notulas::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'notulas' => $notulas,
            'user' => $user
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

        //check if post has photo to delete
        // if($post->photo != ''){
        //     Storage::delete('public/posts/'.$post->photo);
        // }
        $notula->delete();
        return response()->json([
            'success' => true,
            'message' => 'notula deleted'
        ]);
    }
}
