<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddEpisodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addEpisode(Request $request)
    {
        $this->validate($request, [
            'episode' => 'numeric|required',
            'video' => 'URL|required'
        ]);

        \DB::table('episodes')->insert([
            'title' => $_POST['title'],
            'episode' => $_POST['episode'],
            'url' => $_POST['video']
        ]);

        return redirect('/show?title='.$_POST['title']);
    }

    public function deleteEpisode()
    {
        \DB::table('episodes')->where([
                                ['title' , $_POST['title'] ],
                                ['episode' ,$_POST['episode'] ]])->delete();

        return redirect('/show?title='.$_POST['title']);
    }
}
