<?php

namespace App\Http\Controllers\API;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'success', 'data'=> Size::All()]);
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
            'name' => 'required|unique:sizes|max:50'
        ]);

        if($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()], 422);
        }

        $size = new Size();
        $size->name = $request->name;
        $size->save();

        return response()->json(['status'=>'success', 'data'=>$size->toArray()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'=>'success', 'data' => Size::where('id',$id)->first()]);
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
        $size = Size::where('id',$id)->first();

        if(!$size) {
            return response()->json(['status'=>'error','message'=>'Size with specified id does not exist.'], 422);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'sometimes|unique:sizes|max:50'
        ]);;

        if($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()], 422);
        }


        if($request->has('name')) {
            $size->name = $request->name;
        }


        $size->save();

        return response()->json(['status'=>'success', 'data'=>$size->toArray()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyed = Size::destroy($id);

        if($destroyed) {
            return response()->json(['status'=>'success']);
        } else {
            return response()->json(['status'=>'error'], 400);
        }
    }
}
