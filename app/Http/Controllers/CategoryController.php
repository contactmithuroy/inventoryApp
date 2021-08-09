<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:categories,name',
        ]); 
        $category = new Category();
        $category->name = ucfirst($request->name);
        if(!empty($request->status)){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        Session::flash('success','Category has been create successfully!');
        return back();
        // return response()->json($category);
        // return response()->json($request->all());


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $this->validate($request,[
            'name'=>"required|min:2|max:50|unique:categories,name,$category->id",
        ]); 

        $category->name = ucfirst($request->name);
        if(!empty($request->status)){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        Session::flash('success','Category has been update successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $category = Category::whereId($id)->first();
        if($category){
            $category->delete();
            Session::flash('error','Category has been Delete successfully!');
            return back();
        }else{
            Session::flash('error','Fetch some issue!');
            return back();
        }
    }


    // HANDEL AJAX REQUEST
    public function getCategoriesJson(){
        $categories = Category::all();

        return response()->json([
            'success'=>true,
            'data'=>$categories,
        ], Response::HTTP_OK);
    }
}
