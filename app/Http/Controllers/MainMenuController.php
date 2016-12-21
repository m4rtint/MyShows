<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainMenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = \Auth::user()->id;
        $data = \DB::table('shows')->where('id',$id)
        ->orderBy(\DB::raw('RAND()'))
        ->get();
        return view('mainmenu')->with('data',$data);
    }

    public function random()
    {
        $id = \Auth::user()->id;
        $data = \DB::table('shows')->where('id',$id)
                                    ->orderBy(\DB::raw('RAND()'))
                                    ->first();
        $title = $data->title;
        $image_link = $data->image_link;
        $video_link = $data->video_link;
        $description = $data->description;

        return view('random')->with(['title'=>$title,
                            'image'=> $image_link,
                            'video' => $video_link,
                            'description' => $description]);
    }

    public function delete()
    {
        $name = $_POST['name'];

        $finalDescr = \Auth::user()->name." Deleted ".$_POST['name'];
        \DB::table('logs')->insert([
            'id' => \Auth::user()->id,
            'title' => $_POST['name'],
            'description' => $finalDescr,
            'created_at'  => new \DateTime()
        ]);

        \DB::table('shows')->where('title',$name)->delete();
        return redirect('mainmenu');
    }
}