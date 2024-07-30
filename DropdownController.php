<?php

namespace App\Http\Controllers;

use App\Models\{Country,State,City};
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index(){
        $countries=Country::get();
        return view('admin.Registration.form', compact('countries'));
    }


    public function fetchState(Request $request){
        $states = State::where('country_id', $request->country_id)->get(['name', 'id']);
        return response()->json(['states' => $states]);
    }

    public function fetchCity(Request $request){
        $cities = City::where('state_id', $request->state_id)->get(['name', 'id']);
        return response()->json(['cities' => $cities]);
    }
}


