<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use PDF;
use App\Notulas;
use App\Points;
use App\Attendances;
use App\FollowUp;

use App\Photos;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notula($id)

    {

    	$notula = Notulas::join('meetings','meetings.id','=','notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','notulas.summary','meetings.date',
        'meetings.location','meetings.agenda','meetings.start_time','meetings.end_time',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title','notulas.created_at', 'notulas.updated_at')
        ->where('notulas.id',$id)->get();

        $user = Notulas::join('users','users.id','=','notulas.user_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','notulas.summary','users.name_organization',
        'users.name_organization','users.address_organization','users.name')
        ->where('notulas.id',$id)->get();

        $point = Points::where('notulas_id',$id)->orderBy('created_at','asc')->get();
        $followup = FollowUp::where('notulas_id',$id)->orderBy('created_at','asc')->get();
        $attendances= Notulas::join('attendances','attendances.meetings_id','=','notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','attendances.id as attendances_id',
        'attendances.name as name','attendances.position as position')->where('notulas.id',$id)->orderBy('attendances.id','asc')->get();

    	return view('notula', ['notula' => $notula],['point' => $point, 'followup' => $followup, 'attendances' => $attendances, 'user' => $user]);

        // $followup = FollowUp::where('notulas_id',$id)->orderBy('created_at','asc')->get();
        // // $points = Points::where('notulas_id',$id)->orderBy('created_at','asc')->get();

    	// return view('notula', ['notula' => $notula],['points' => $points],['followup' => $followup]);



    }


    public function notulas($id)

    {

    	$notula = Notulas::join('meetings','meetings.id','=','notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','notulas.title','notulas.summary','meetings.date',
        'meetings.location','meetings.agenda','meetings.start_time','meetings.end_time',
        'notulas.created_at', 'notulas.updated_at','meetings.title as meetings_title','notulas.created_at', 'notulas.updated_at')
        ->where('notulas.id',$id)->get();

        $point = Points::where('notulas_id',$id)->orderBy('created_at','asc')->get();
        $followup = FollowUp::where('notulas_id',$id)->orderBy('created_at','asc')->get();
        $attendances= Notulas::join('attendances','attendances.meetings_id','=','notulas.meetings_id')->
        select('notulas.id','notulas.user_id', 'notulas.meetings_id','attendances.id as attendances_id',
        'attendances.name as name','attendances.position as position')->where('notulas.id',$id)->orderBy('notulas.id','asc')->get();

    	return view('notulas', ['notula' => $notula],['point' => $point, 'followup' => $followup, 'attendances' => $attendances]);

        // $followup = FollowUp::where('notulas_id',$id)->orderBy('created_at','asc')->get();
        // // $points = Points::where('notulas_id',$id)->orderBy('created_at','asc')->get();

    	// return view('notula', ['notula' => $notula],['points' => $points],['followup' => $followup]);



    }


    public function photos($photo)

    {

    	$photos = Photos::where('photos.photo',$photo)->get();

    	return view('photos', ['photos' => $photos]);



    }



    public function generatePDF($mid)

    {
        $notulas= Notulas::where('meetings_id',$mid)->get();

        $data = ['title' => 'Welcome to HDTuto.com'];

        $pdf = PDF::loadView('notula/{mid}')->setOptions(['defaultFont' => 'sans-serif']);



        return $pdf->download('tes.pdf');

    }
}
