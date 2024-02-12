<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $cat = Category::where('id','!=','1')->get();
        return view('admin.pages.category.index')->with('cat',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:height=100',
            'file2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $slug = Str::replace(' ','-', $request->input('name_ar'));
        if($request->hasFile('file') && $request->hasFile('file2')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            
            
            $file->storeAs('public/Services',time().'.'.$fileName);
            $icon_path = 'Services/'.time().'.'.$fileName;

            $file2 = $request->file('file2');
            $fileName2 = $file2->getClientOriginalName();
            
            // return $file."</br>".$fileName."</br>".$file2."</br>".$fileName2;
            
            $file2->storeAs('public/Services',time().'.'.$fileName2);
            $img_path = 'Services/'.time().'.'.$fileName2;
            
            $cat = new Category();
            $cat->name_en = $request->input('name_en');
            $cat->name_ar = $request->input('name_ar');
            $cat->slug = $slug;
            $cat->description_en = $request->input('description_en');
            $cat->description_ar = $request->input('description_ar');
            $cat->icon_path = $icon_path;
            $cat->img_path = $img_path;
            $cat->save();
            
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
        $cat = Category::where('id',$id)->get();
        return view('admin.pages.category.edit')->with('cat',$cat);
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
        Category::where('id',$id)->update([
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'description_en' => $request->input('description_en'),
            'description_ar' => $request->input('description_ar'),
        ]);
        if($request->hasFile('file')) {
            $cat = Category::find($id);
            $file_path = public_path("storage/".$cat->icon_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:height=100',
            ]);

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            //return $file."</br>".$fileName;
            
            $file->storeAs('public/Services',time().'.'.$fileName);
            $img_path = 'Services/'.time().'.'.$fileName;

            Category::where('id',$id)->update([
                'icon_path' => $img_path
            ]);
        }

        if($request->hasFile('file2')) {
            $cat = Category::find($id);
            $file_path = public_path("storage/".$cat->img_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $this->validate($request, [
                'file2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file2 = $request->file('file2');
            $fileName2 = $file2->getClientOriginalName();
            
            //return $file."</br>".$fileName;
            
            $file2->storeAs('public/Services',time().'.'.$fileName2);
            $img_path = 'Services/'.time().'.'.$fileName2;

            Category::where('id',$id)->update([
                'img_path' => $img_path
            ]);
        }
        Session()->put('msg', 'تم تعديل العنصر بنجاح');
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
        $cat = Category::find($id);
        $file_path = public_path("storage/".$cat->icon_path);
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        $file_path2 = public_path("storage/".$cat->img_path);
        if(File::exists($file_path2)){
            File::delete($file_path2);
        }

        $cat->delete();
        Session()->put('msg', 'تم حذف المشروع بنجاح');
        return redirect(route('category.index'));
    }
}
