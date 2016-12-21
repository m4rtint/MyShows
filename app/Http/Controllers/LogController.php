<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = \Auth::user()->id;
        $data = \DB::table('logs')->where('id',$id)->orderby('created_at','desc')->get();
        return view('log')->with('data',$data);
    }



}
