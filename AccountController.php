<?php

namespace App\Http\Controllers;

use App\Models\{City,User,Country,State};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index(){
        $countries=Country::get();
        return view('users.create', compact('countries'));
    }

    public function fetchState(Request $request ){
        $states = State::where('country_id', $request->country_id)->get(['name', 'id']);
        return response()->json(['states' => $states]);
    }

    public function fetchCity(Request $request){
        $cities = City::where('state_id', $request->state_id)->get(['name', 'id']);
        return response()->json(['cities' => $cities]);
    }

    public function save(Request $request){
        $validatorUser=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email'
        ]);
        if($validatorUser->passes()){
            //save value in DB
            $user= new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->country=$request->country;
            $user->state=$request->state;
            $user->city=$request->city;
            $user->save();
            session()->flash('success','User added successfuly.');
            return response()->json([
                'status' => 1,
                 ]);
            

        }else {
            //return error
             return response()->json([
               'status' => 0,
               'errosr' =>$validatorUser->errors()
            ]);
        }
    }
    public function list(){
        $users=User::get();
        return view('users.list', compact('users'));
    }
    public function edit($id){
       $user=User::find($id);
       $data['countries']=Country::get();
       $data['states'] = State::where('country_id',$user->country)->get(['name', 'id']);
       $data['cities'] = City::where('state_id', $user->state)->get(['name', 'id']);
      
      
       if ($user == null){
        return redirect()->route('list');
       }
       $data['user']=$user;
        return view('users.edit',$data);
    }

    public function update($id,Request $request){

        $user= User::find($id);
        if($user==null){
            Session()->flash('error','User not found.');
            return  redirect()->back()->with('status', 'User not found.');
        }
        $validatorUser=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email'
        ]);
        if($validatorUser->passes()){
            //save value in DB
           
            $user->name=$request->name;
            $user->email=$request->email;
            $user->country=$request->country;
            $user->state=$request->state;
            $user->city=$request->city;
            $user->save();
            session()->flash('success','User updated successfuly.');
            

            return response()->json([
                'status' => 1,
                'redirect_url' => route('list')
                 ]); 
            

        }else {
            //return error
             return response()->json([
               'status' => 0,
               'errosr' =>$validatorUser->errors()
            ]);
        }
    }
   
}

