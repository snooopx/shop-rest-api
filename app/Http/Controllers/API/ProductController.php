<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'upc'   => 'required|unique:products',
            'name'  => 'required|unique:products,name',
            'brand_id' => 'required|integer',
            'size_id'   => 'required|integer',
            'category_id'   => 'required|integer',
            'sub_cat_id'    =>'sometimes|required|integer'
        ]);

        if($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()], 422);
        }



        $product = new Product();
        $product->upc = $request->upc;
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->size_id = $request->size_id;

        if($request->has('description')) {
            $product->description = $request->description;
        }

        if($request->has('count')) {
            $product->count = $request->count;
        }

        if($request->has('description')) {
            $product->description = $request->description;
        }

        $product->save();

        $product_category = new ProductCategory();

        $product_category->product_id = $product->id;

        $product_category->cat_id = $request->category_id;

        if($request->has('sub_category_id')) {
            $product_category->cat_id = $request->sub_category_id;
        }

        $product_category->save();

        return response()->json(['status'=>'success', 'data'=>$product->toArray()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        if(!$product) {
            return response()->json(['status'=>'error','message'=>'Product for specified id does not exist.'], 422);
        }

        $product->brand->toArray();
        $product->size->toArray();
        $product->categories->toArray();

        return response()->json(['status'=>'success', 'data' => $product]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
