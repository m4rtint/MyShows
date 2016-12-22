<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('add');
    }

    public function addNewShow(Request $request)
    {
        $this->validate($request, [
        'title' => 'unique:shows|required',
        'image' => 'URL|required',
        'video' => 'URL|required'
        ]);

        $finalDescr = \Auth::user()->name." added ".$_POST['title'];
        \DB::table('logs')->insert([
            'id' => \Auth::user()->id,
            'title' => $_POST['title'],
            'description' => $finalDescr,
            'created_at'  => new \DateTime()
        ]);

        \DB::table('episodes')->insert([
            'title' => $_POST['title'],
            'episode' => $_POST['episode'],
            'url' => $_POST['video']
        ]);

        \DB::table('shows')->insert([
            'id' => \Auth::user()->id,
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image_link' => $_POST['image'],
            'video_link' => $_POST['video'],
        ]);

        return redirect('/show?title='.$_POST['title']);
    }

    public function index_edit()
    {
        $data = \DB::table('shows')->where('title', $_GET['title'])->first();
        return view('edit')->with([
            'title' => $data->title,
            'description' => $data->description,
            'video' => $data->video_link,
            'image' => $data->image_link
        ]);
    }

    public function editShow(Request $request)
    {
        $this->validate($request, [
            'image' => 'URL|required',
            'video' => 'URL|required'
        ]);

        $finalDescr = \Auth::user()->name." editted ".$_POST['title'];
        \DB::table('logs')->insert([
            'id' => \Auth::user()->id,
            'title' => $_POST['title'],
            'description' => $finalDescr,
            'created_at'  => new \DateTime()
        ]);

        \DB::table('shows')->where('title', $_POST['title'])
                            ->update([
                                'description' => $_POST['description'],
                                'image_link' => $_POST['image'],
                                'video_link' => $_POST['video']
                            ]);
        return redirect('/mainmenu');
    }
}
