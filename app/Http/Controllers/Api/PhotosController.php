<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meetings;
use App\Photos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Image;

class PhotosController extends Controller
{



        public function create(Request $request){
        // mistake
        $photos = new Photos;
        $photos->user_id = Auth::user()->id;
        $photos->meetings_id = $request->meetings_id;
        $photos->title = $request->title;
        if($request->photo != ''){
            $now = date('Y-m-d', time());
            $username= Auth::user()->name;
            $photo = $username.'_'.$now.'_'.time().'.jpg';
           file_put_contents('storage/photos/'.$photo,base64_decode($request->photo));
            $photos->photo = $photo;


        }
         $photos->save()->limit(1);
        $photos->user;
        return response()->json([
            'success' => true,
            'message' => 'posted',
            'photos' => $photos
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
        if($photos->photo != ''){
            Storage::delete('public/photos/'.$photos->photo);
        }
        $photos->delete();
        return response()->json([
            'success' => true,
            'message' => 'post deleted'
        ]);
    }

    // public function mphotos(){
    //     $photos = Photos::where('user_id',Auth::user()->id)->orderBy('id','title')->get();
    //     $user = Auth::user();
    //     return response()->json([
    //         'success' => true,
    //         'photos' => $photos,
    //         'user' => $user
    //     ]);

    // }

    public function photos(){
        $photos = Photos::where('user_id',Auth::user()->id)->get();
        foreach($photos as $photo){

            $photo->user;
        }

        return response()->json([
            'success' => true,
            'photos' => $photos
        ]);
    }
    public function listPhotos($mid){
        $photos = Photos::where('user_id',Auth::user()->id)->where('meetings_id',$mid)->orderBy('id','asc')->get();
        foreach($photos as $photo){

            $photo->user;
        }

        return response()->json([
            'success' => true,
            'photos' => $photos
        ]);
    }

    public function detailPhotos($pid){
        $photos = Photos::where('user_id',Auth::user()->id)->where('id',$pid)->get();
        foreach($photos as $photo){

            $photo->user;
        }

        return response()->json([
            'success' => true,
            'photos' => $photos
        ]);
    }


    // public function photos(){
    //     $photos = Photos::where('user_id',Auth::user()->id)->orderBy('id','title')->get();
    //     $user = Auth::user();
    //     return response()->json([
    //         'success' => true,
    //         'photos' => $photos,
    //         'user' => $user
    //     ]);
    // }


        // $photoName = $request->file('photo');
        // $newPhotoName = time().'.'.$photoName->getClientOriginalExtension();

        // $destinationPath = public_path('storage/photos/');
        // $img = Image::make($photoName->path());
        // $img->resize(1080, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$newPhotoName,base64_decode($request->photo);

        // // $destinationPath = public_path('storage/photos/');
        // $photoName->move(public_path('storage/thumbnail/'), $newPhotoName);

        // // $photoName = $request->file('photo');
        // // $newPhotoName = rand() . '.' . $photoName->getClientOriginalExtension();
        // // $photoName->move(public_path('storage/photos/'), $newPhotoName);

        // $photos = new Photos;
        // $photos->user_id = Auth::user()->id;
        // $photos->meetings_id = $request->meetings_id;
        // $photos->title = $request->title;
        // $photos->photo = $newPhotoName;

        // $photos->save();

        // $photos->user;
        // return response()->json([
        //     'success' => true,
        //     'message' => 'posted',
        //     'photos' => $photos
        // ]);




}
