<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\SupportProjects;
use App\Models\SupportVideos;
use Illuminate\Support\Facades\Storage;

class LiveChatController extends Controller
{
    public function index()
    {
        $support = SupportProjects::orderBy('id','ASC')->with('projects')->with('users')->get();
        return view('chat.index')->with('support',$support);
    }

    public function chooseService($id)
    {
        $videos = SupportVideos::where('support_projects_id',$id)->get();
        return view('chat.videos',[
            'videos' => $videos,
        ]);
    }

}
