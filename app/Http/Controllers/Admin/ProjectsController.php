<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Project_Details;
use App\Models\Projects;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::all();
        return view('admin.pages.projects.index')->with('projects',$projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::all();
        $services = Services::where('category_id','1')->get();
        return view('admin.pages.projects.create',['clients'=>$clients,'services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file1' => 'required|mimes:pdf|max:5000',
        ]);

        
        if($request->hasFile('file')) {
            $slug = Str::replace(' ','-', $request->input('name_ar'));
            $str = explode("?v=", $request->input('video'));
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            $file1 = $request->file('file1');
            $fileName1 = $file1->getClientOriginalName();
            
            $file->storeAs('public/Projects',time().'.'.$fileName);
            $img_path = 'Projects/'.time().'.'.$fileName;

            $file1->storeAs('public/Projects',time().'.'.$fileName1);
            $file_path = 'Projects/'.time().'.'.$fileName1;

            $projects = new Projects();
            $projects->service_id = $request->input('service');
            $projects->name_en = $request->input('name_en');
            $projects->name_ar = $request->input('name_ar');
            $projects->slug = $slug;
            $projects->desc = $request->input('desc');
            $projects->details = $request->input('editor1');
            $projects->video = $str[1];
            $projects->img_path = $img_path;
            $projects->file_path = $file_path;
            $projects->save();
            $id = $projects->id;

            // $details = new Project_Details();
            // $details->project_id = $id;
            // $details->desc = $request->input('editor1');
            // $details->save();
            // $count = count($request->input('feature'));

            // for ($i=0; $i < $count; $i++) { 
            //     $details = new Project_Details();
            //     $details->project_id = $id;
            //     $details->desc = $request->feature[$i];
            //     $details->save();
            // }
            Session()->put('msg', 'تم اضافة العنصر بنجاح');
            return back();
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
        $projects = Projects::where('id',$id)->get();
        $details = Project_Details::where('project_id',$id)->get();
        $clients = Clients::all();
        $services = Services::where('category_id','1')->get();
        return view('admin.pages.projects.edit',['clients'=>$clients,'services'=>$services,'projects'=>$projects,'details'=>$details]);
    }

    public function editDetails($id)
    {
        $details = Project_Details::where('id',$id)->get();
        return view('admin.pages.projects.editDetails')->with('details',$details);
    }

    public function addDetails($id)
    {
        $projects = Projects::where('id',$id)->get();
        return view('admin.pages.projects.addDetails')->with('projects',$projects);
    }

    public function add_Details(Request $request, $id)
    {
        $count = count($request->input('feature'));

            for ($i=0; $i < $count; $i++) {
                $details = new Project_Details();
                $details->project_id = $id;
                $details->desc = $request->feature[$i];
                $details->save();
            }
        Session()->put('msg', 'تم اضافة العنصر بنجاح');
        return redirect(route('projects.edit',$id));
    }

    public function updateDetails(Request $request,$id)
    {
        Project_Details::where('id',$id)->update([
            'desc' => $request->input('desc'),
        ]);

        $projects = Project_Details::where('id',$id)->get();

        Session()->put('msg', 'تم تعديل العنصر بنجاح');
        return redirect(route('projects.edit',$projects[0]['project_id']));
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
        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file1' => 'mimes:pdf|max:5000',
        ]);

        $slug = Str::replace(' ','-', $request->input('name_ar'));
        $str = explode("?v=", $request->input('video'));
        
        Projects::where('id',$id)->update([
            'service_id' => $request->input('service'),
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'slug' => $slug,
            'desc' => $request->input('desc'),
            'details' => $request->input('editor1'),
            'video' => $str[1],
        ]);

        // Project_Details::where('project_id',$id)->update([
        //     'desc' => $request->input('editor1'),
        // ]);
        if($request->hasFile('file')) {
            $cat = Projects::find($id);
            $file_path = public_path("storage/".$cat->img_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('public/Projects',time().'.'.$fileName);
            $img_path = 'Projects/'.time().'.'.$fileName;
            

            Projects::where('id',$id)->update([
                'img_path' => $img_path
            ]);
            
        }

        if($request->hasFile('file1')) {
            $cat = Projects::find($id);
            $file_path = public_path("storage/".$cat->file_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $file = $request->file('file1');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('public/Projects',time().'.'.$fileName);
            $file_path = 'Projects/'.time().'.'.$fileName;
            

            Projects::where('id',$id)->update([
                'file_path' => $file_path
            ]);
            
        }
        Session()->put('msg', 'تم اضافة العنصر بنجاح');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::find($id);
        $file_path = public_path("storage/".$project->img_path);
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        $file_path2 = public_path("storage/".$project->file_path);
        if(File::exists($file_path2)){
            File::delete($file_path2);
        }

        $project->delete();
        Session()->put('msg', 'تم حذف المشروع بنجاح');
        return redirect(route('projects.index'));
    }

    public function deleteDetails($id, $projectID)
    {
        $details = Project_Details::find($id);
        $details->delete();
        Session()->put('msg', 'تم حذف العنصر بنجاح');
        return redirect(route('projects.edit',$projectID));
    }

    public function fileDownload($id)
    {
        $file = Projects::where('id',$id)->get();
        return Storage::download('public/'.$file[0]['file_path']);
    }
}
