<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Session;
class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::orderBy('created_at','desc')->get();
        return view('admin.size.index',compact('sizes'));
    }


    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:1|max:50|unique:sizes,name',
        ]);
        $size = new Size();
        $size->name = ucfirst($request->name);
        if(!empty($request->status)){
            $size->status = 1;
        }else{
            $size->status = 0;
        }
        $size->save();
        Session::flash('success','Size has been create successfully!');
        return back();
    }


    public function show(Size $size)
    {
        //
    }


    public function edit(Size $size)
    {
        return view('admin.size.edit',compact('size'));
    }


    public function update(Request $request, Size $size)
    {
        $this->validate($request,[
            'name'=>"required|min:1|max:50|unique:sizes,name,$size->id",
        ]); 

        $size->name = ucfirst($request->name);
        if(!empty($request->status)){
            $size->status = 1;
        }else{
            $size->status = 0;
        }
        $size->save();
        Session::flash('success','Size has been update successfully!');
        return back();
    }


    public function destroy($id)
    {
        $size = Size::whereId($id)->first();
        if($size){
            $size->delete();
            Session::flash('error','Size has been Delete successfully!');
            return back();
        }else{
            Session::flash('error','Fetch some issue!');
            return back();
        }
    }


    // HANDEL AJAX REQUEST
    public function getSizeJson(){
        $size = Size::all();

        return response()->json([
            'success'=>true,
            'data'=>$size,
        ], Response::HTTP_OK);
    }
}
