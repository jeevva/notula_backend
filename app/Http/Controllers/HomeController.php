<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use PDF;
use App\Notulas;
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

        // / mengambil data pegawai
    	$notula = Notulas::where('id',$id)->get();

    	// mengirim data pegawai ke view pegawai
    	return view('notula', ['notula' => $notula]);


    }

    public function generatePDF($mid)

    {
        $notulas= Notulas::where('meetings_id',$mid)->get();

        $data = ['title' => 'Welcome to HDTuto.com'];

        $pdf = PDF::loadView('notula/{mid}')->setOptions(['defaultFont' => 'sans-serif']);



        return $pdf->download('tes.pdf');

    }
}
