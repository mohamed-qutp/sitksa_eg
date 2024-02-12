<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Article_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','desc')->get();
        return view('admin.pages.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'dimensions' => 'Image dimensions must be width: 800px and height: 460px',
        ];
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        if($request->input('alt_img') != null){
            $alt_img = $request->input('alt_img');
        }else{
            $alt_img = null;
        }

        if($request->input('video') != null){
            $str = explode("?v=", $request->input('video'));
            $video = $str[1];
        }else{
            $video = null;
        }

        $slug = Str::replace(' ','-', $request->input('title'));

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            
            $file->storeAs('public/Articles',time().'.'.$fileName);
            $img_path = 'Articles/'.time().'.'.$fileName;

            $str = explode("?v=", $request->input('video'));

            $article = new Article();
            $article->title = $request->input('title');
            $article->slug = $slug;
            $article->meta_tag = $request->input('meta_tag');
            $article->description = $request->input('editor1');
            $article->img_path = $img_path;
            $article->video = $video;
            $article->alt_img = $alt_img;

            $article->save();
            $lastid = $article->id;

            Session()->put('msg', 'تم اضافة المقالة بنجاح');
            return redirect(route('article.edit',$lastid));
        }
    }


    // create article details
    public function createDetails($id)
    {
        $article = Article::where('id',$id)->get();
        return view('admin.pages.articles.createDetails')->with('article',$article);
    }

    // store article details
    public function storeDetails(Request $request, $id)
    {
        $count = count($request->input('desc'));

        for ($i=0; $i < $count; $i++) { 
            $article = new Article_Details();
            $article->article_id = $id;
            $article->tag = $request->tag[$i];
            $article->description = $request->desc[$i];
            $article->save();
        }
        Session()->put('msg', 'تم اضافة تفاصيل المقالة بنجاح');
        return redirect(route('article.edit',$id));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id',$id)->get();
        $details = Article_Details::where('article_id',$id)->get();
        return view('admin.pages.articles.edit',[
            'article' => $article,
            'details' => $details,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('id',$id)->get();
        $details = Article_Details::where('article_id',$id)->get();
        return view('admin.pages.articles.edit',[
            'article' => $article,
            'details' => $details,
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

        if($request->input('alt_img') != null){
            $alt_img = $request->input('alt_img');
        }else{
            $alt_img = null;
        }

        if($request->input('video') != null){
            $str = explode("?v=", $request->input('video'));
            $video = $str[1];
        }else{
            $video = null;
        }
        $slug = Str::replace(' ','-', $request->input('title'));
        Article::where('id',$id)->update([
            'title' => $request->input('title'),
            'slug' => $slug,
            'video' => $video,
            'alt_img' => $alt_img,
            'meta_tag' => $request->input('meta_tag'),
            'description' => $request->input('editor1'),
        ]);

        if($request->hasFile('file')) {

            $art = Article::find($id);
            $file_path = public_path("storage/".$art->img_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            
            $file->storeAs('public/Articles',time().'.'.$fileName);
            $img_path = 'Articles/'.time().'.'.$fileName;

            Article::where('id',$id)->update([
                'img_path' => $img_path
            ]);

        }
        Session()->put('msg', 'تم تعديل المقالة بنجاح');
        return redirect(route('article.edit',$id));
    }


    // edit details
    public function editDetails($id)
    {
        $details = Article_Details::where('id',$id)->get();
        return view('admin.pages.articles.editDetails')->with('details',$details);
    }


    // update details
    public function updateDetails(Request $request ,$id)
    {
        Article_Details::where('id',$id)->update([
            'tag' => $request->input('tag'),
            'description' => $request->input('desc')
        ]);
        Session()->put('msg', 'تم تعديل المقالة بنجاح');
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
        $article = Article::find($id);
        $file_path = public_path("storage/".$article->img_path);
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        $article->delete();
        Session()->put('msg', 'تم حذف المقالة بنجاح');
        return redirect(route('article.index'));
    }

    // delete details 
    public function destroyDetails($id)
    {
        $details = Article_Details::find($id);
        $details->delete();
        Session()->put('msg', 'تم حذف تفاصيل المقالة بنجاح');
        return redirect(route('article.index'));
    }
}
