<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $episodes = \DB::table('episodes')->where('title', $_GET['title'])->get();
        $data = \DB::table('shows')->where('title',$_GET['title'])->first();
        $title = $data->title;
        $desc = $data->description;
        $img = $data->image_link;
        $vid = $data->video_link;
        return view('show')->with(['title' => $title,
                                    'description' => $desc,
                                    'image' => $img,
                                    'video' => $vid,
                                    'episodes' => $episodes]);

    }

    public function addShow()
    {
        $this->validate($request, [
        'video' => 'URL|required'
        ]);

        \DB::table('episodes')->insert([
            'title' => $_POST['title'],
            'episode' => $_POST['episode'],
            'url' => $_POST['video']
        ]);
    }

}
