<?php

namespace App\Http\Controllers\API;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'success', 'data'=> Brands::All()]);
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
            'name' => 'required|unique:brands|max:255'
        ]);

        if($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()], 422);
        }

        $brand = new Brands();
        $brand->name = $request->name;
        $brand->website = $request->website;
        $brand->save();

        return response()->json(['status'=>'success', 'data'=>$brand->toArray()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'=>'success', 'data' => Brands::where('id',$id)->first()]);
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
        $brand = Brands::where('id',$id)->first();

        if(!$brand) {
            return response()->json(['status'=>'error','message'=>'Brand for specified id does not exist.'], 422);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'sometimes|unique:brands|max:255'
        ]);;

        if($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()], 422);
        }


        if($request->has('name')) {
            $brand->name = $request->name;
        }

        if($request->has('website')){
            $brand->website = $request->website;
        }


        $brand->save();

        return response()->json(['status'=>'success', 'data'=>$brand->toArray()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brands::destroy($id);
    }

}
