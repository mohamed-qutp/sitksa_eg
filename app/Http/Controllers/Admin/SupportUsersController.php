<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportUsers;

class SupportUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = SupportUsers::all();
        return view('admin.pages.support.addUsers')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SupportUsers::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        Session()->put('msg', 'تم اضافة موظف الدعم بنجاح');
        return back();
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
        $user = SupportUsers::where('id',$id)->get();
        $users = SupportUsers::where('id','!=',$id)->get();
        return view('admin.pages.support.editUser',[
            'user' => $user,
            'users' => $users,
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
        SupportUsers::where('id',$id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        Session()->put('msg', 'تم تعديل بيانات موظف الدعم بنجاح');
        return redirect(route('support-users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = SupportUsers::find($id);
        $user->delete();
        Session()->put('msg', 'تم حذف الموظف بنجاح');
        return back();
    }
}
