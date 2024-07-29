<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['centers']=Center::all();

        return response()->json([
            'status'=>true,
            'message'=>"All post Data",
            'data'=>$data,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateUser= Validator::make(
            $request->all(),
            [
                'tp_id'=>'required',
                'center_name'=>'required',
                'center_id'=>'required',
                'center_location'=>'required',
                'center_image'=>'required|mimes:png,jpg,jpeg,gif,jfif',
              
                 
            ]
            );
        if($validateUser->fails()){
            return response()->json([
                'status'=>false,
                'message'=>"validation Error",
                'errors'=>$validateUser->errors()->all()
            ],401);
        }

    if ($request->hasFile('center_image')) {
        $img = $request->file('center_image');
        $ext=$img->getClientOriginalExtension();
        $imageName=time().'.'.$ext;
        $img->move(public_path().'/documents',$imageName);

        $centers=Center::create([
            'tp_id'=>$request->tp_id,
            'center_id'=>$request->center_id,
            'center_name'=>$request->center_name,
            'center_location'=>$request->center_location,
            'center_image'=>$imageName,
        ]);
        
       
            return response()->json([
                'status'=>true,
                'message'=>"Center Created Successfuly",
                'centers'=>$centers,
            ],200);
        
    }else {
        return response()->json([
            'status' => false,
            'message' => "Image file is missing",
        ], 400);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['centers']=Center::select(
            'id',
            'tp_id',
            'center_id',
            'center_name',
            'center_location',
            'center_image'
        )->where(['id'=>$id])->get();

        return response()->json([
            'status'=>true,
            'message'=>"Single centers show",
            'centers'=>$data,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateUser= Validator::make(
            $request->all(),
            [
                'tp_id'=>'required',
                'center_name'=>'required',
                'center_id'=>'required',
                'center_location'=>'required',
                'center_image'=>'required|mimes:png,jpg,jpeg,gif,jfif',
              
                 
            ]
            );
        if($validateUser->fails()){
            return response()->json([
                'status'=>false,
                'message'=>"validation Error",
                'errors'=>$validateUser->errors()->all()
            ],401);
        }
        $centers = Center::find($id);

    if ($request->hasFile('center_image')) {
        // Remove old image
        $path = public_path('/documents');
        if ($centers->center_image && file_exists($path . '/' . $centers->center_image)) {
            unlink($path . '/' . $centers->center_image);
        }

        $img = $request->file('center_image');
            $ext=$img->getClientOriginalExtension();
            $imageName=time().'.'.$ext;
            $img->move(public_path().'/documents',$imageName);
        }else{
            $imageName = $centers->center_image;
        }
       

        $centers=Center::where(['id'=>$id])->update([ 
            'tp_id'=>$request->tp_id,
            'center_id'=>$request->center_id,
            'center_name'=>$request->center_name,
            'center_location'=>$request->center_location,
            'center_image'=>$imageName,
        ]);
        
       
            return response()->json([
                'status'=>true,
                'message'=>"Center Updated Successfuly",
                'centers'=>$centers,
            ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $center = Center::find($id);
    
    if (!$center) {
        return response()->json([
            'status' => false,
            'message' => "Center not found",
        ], 404);
    }
        
       
    $imagePath = public_path('/documents/' . $center->center_image);

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $center->delete();

    return response()->json([
        'status' => true,
        'message' => "Center Deleted Successfully",
    ], 200);
}
}
