<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\SupportProjects;
use App\Models\SupportUsers;
use App\Models\SupportVideos;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $support = SupportProjects::orderBy('id','DESC')->with('projects')->with('users')->get();
        $projects = DB::table('projects')
        ->select(
            'projects.id',
            'name_ar'
        )
        ->whereNotExists( function ($query) use ($support) {
            $query->select(DB::raw(1))
            ->from('support_projects')
            ->whereRaw('projects.id = support_projects.project_id')
            ->where('support_projects.project_id', '=', $support[0]['project_id']);
        })
        ->get();

        $supportusers = SupportUsers::all();
        return view('admin.pages.support.index',[
            'support'=>$support,
            'projects' => $projects,
            'supportusers' => $supportusers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $support = SupportProjects::pluck('project_id')->all();
        $projects = Projects::whereNotIn('id',$support)->get();
        $supportusers = SupportUsers::all();

        return view('admin.pages.support.add',[
            'support'=>$support,
            'projects' => $projects,
            'supportusers' => $supportusers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createVideos($id)
    {
        return view('admin.pages.support.addVideos')->with('id',$id);
    }

    public function storeVideos(Request $request, $id)
    {
        $count = count($request->input('title'));

        for ($i=0; $i < $count; $i++) {
            $str = explode("?v=", $request->video[$i]);
            $support = new SupportVideos();
            $support->support_projects_id = $id;
            $support->title = $request->title[$i];
            $support->video = $str[$i];
            $support->save();
        } 
        Session()->put('msg', 'تم اضافة برنامج الدعم بنجاح');
        return redirect(route('support.edit',$id));
    }

    public function store(Request $request)
    {
        $support = new SupportProjects();
        $support->project_id = $request->projects;
        $support->support_user_id =  $request->supportusers;
        $support->save();
        $id = $support->id;

        switch ($request->submit) {
            case 'save-only':
                return redirect(route('support.index'));
                break;
            
            case 'save-video':
                return redirect(route('support.createVideos',$id));
                break;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supportObj = SupportProjects::where('id',$id)->with('projects')->with('users')->get();
        $supportusers = SupportUsers::all();
        $supportVideos = SupportVideos::where('support_projects_id',$id)->get();

        return view('admin.pages.support.edit',[
            'supportObj' => $supportObj,
            'supportusers' => $supportusers,
            'supportVideos' => $supportVideos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SupportProjects::where('id',$id)->update([
            'support_user_id' => $request->supportusers
        ]);
        Session()->put('msg', 'تم تعديل موظف  الدعم للمشروع بنجاح');
        return redirect(route('support.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vid = SupportProjects::find($id);
        $vid->delete();
        Session()->put('msg', 'تم حذف المشروع من الدعم بنجاح');
        return back();
    }

    public function destroyVideo($id)
    {
        $vid = SupportVideos::find($id);
        $vid->delete();
        Session()->put('msg', 'تم حذف فيديو المشروع بنجاح');
        return back();
    }
}
