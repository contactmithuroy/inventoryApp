<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Session;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('created_at','desc')->get();
        return view('admin.brand.index',compact('brands'));
    }


    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:brands,name',
        ]);
        $brand = new Brand();
        $brand->name = ucfirst($request->name);
        if(!empty($request->status)){
            $brand->status = 1;
        }else{
            $brand->status = 0;
        }
        $brand->save();
        Session::flash('success','Brand has been create successfully!');
        return back();
    }


    public function show(Brand $brand)
    {
        //
    }


    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }


    public function update(Request $request, Brand $brand)
    {
        // return response()->json($request);
        $this->validate($request,[
            'name'=>"required|min:2|max:50|unique:brands,name,$request->id",
        ]);

        $brand->name = ucfirst($request->name);
         
        if(!empty($request->status)){
            $brand->status = 1;
        }else{
            $brand->status = 0;
        }
        $brand->save();
        Session::flash('success','Brand has been update successfully!');
        return back();
    }


    public function destroy($id)
    {
        $brand = Brand::whereId($id)->first();
        if($brand){
            $brand->delete();
            Session::flash('error','Brand has been Delete successfully!');
            return back();
        }else{
            Session::flash('error','Fetch some issue!');
            return back();
        }
    }

    // HANDEL AJAX REQUEST
    public function getBrandJson(){
        $brands = Brand::all();

        return response()->json([
            'success'=>true,
            'data'=>$brands,
        ], Response::HTTP_OK);
    }
}