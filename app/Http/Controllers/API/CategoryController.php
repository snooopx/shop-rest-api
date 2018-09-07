<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Category::All());
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
            'name' => 'required|unique:categories|max:100',
            'parent_id' => 'sometimes|exists:categories,id'
        ]);
//        dd($request->all());
        if($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()], 422);
        }

        $category = new Category();
        $category->name = $request->name;
        if($request->has('parent_id')) {
            $category->parent_id = $request->parent_id;
        }
        $category->save();

        return response()->json(['status'=>'success', 'data' => $category->toArray()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->first();
        $category->subcategory->toArray();

        return response()->json(['status'=>'success', 'data' => $category]);
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
        $category = Category::where('id',$id)->first();

        if(!$category) {
            return response()->json(['status'=>'error','message'=>'Category with specified id does not exist.'], 422);
        }

        // todo Create Validation for checking category.id and category.parent_id pair uniqueness


        if($request->has('name')) {
            $category->name = $request->name;
        }

        if($request->has('parent_id')) {
            $category->parent_id = $request->parent_id;
        }


        $category->save();

        return response()->json(['status'=>'success', 'data' => $category->toArray()]);
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
