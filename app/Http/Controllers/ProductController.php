<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSizeStock;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','Desc')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name'=>'required|min:2|max:100',
        //     'category_id'=>'required|numeric',
        //     'brand_id'=>'required|numeric',
        //     'sku'=>'required|string|max:100|unique:products',
        //     'cost_price'=>'required|numeric',
        //     'retail_price'=>'required|numeric',
        //     'year'=>'required|min:4|max:4',
        //     'status'=>'required',
        //     'description'=>"required|min:2|max:300",
        //     'image'=>'required|image|mimes:jpeg,jpg,png|max:5000',
        // ]); 

        $product = new Product();
        $product->user_id = 1;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sku = $request->sku;
        $product->cost_price = $request->cost_price;
        $product->retail_price = $request->retail_price;
        $product->year = $request->year;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->slug = Str::slug($request->name,'-');
        if(Product::whereSlug($product->slug)->exists() ){
            $product->slug = "{$product->slug}_" . rand(0,500);

        }
        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = time().'-'.rand(100,1000).'.'.$image->getClientOriginalExtension();
            $image->storeAs('inventoryApp/product_Image',$imageName);
            $product->image = $imageName;
        }
        //$product->save();



        return dd($request->items);
        // store product_size_stock
        if(count($request->items) > 0){
            foreach($request->items as $key => $item){
                ProductSizeStock::create([
                    'product_id' => $product->id,
                    'size_id' => $item->size_id, 
                    'location' => $item->location,
                    'quantity' => $item->quantity,
                ]);
            }
        }

        return response()->json([
            'success'=>true,
            'data'=>$product,
        ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
