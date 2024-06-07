<?php

namespace App\Http\Controllers;
use App\Models\Hospital_sec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\user_m;


class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if ($usertype == '1'){

            return view('admin.home');
        }
        else{
            $product = Hospital_sec::all();
            return view('home.home',compact('product'));
        }
    }

    public function index()
    {
        $product = Hospital_sec::all();
        return view('home.home',compact('product'));
    }

    public function contact(){

        return view('home.contact');
    }

    public function user_message(Request $request){

         $user_message = new user_m();

        $user_message->name = $request->name;
        $user_message->email = $request->email;
        $user_message->phone = $request->phone;
        $user_message->user_message = $request->message;

        $user_message->save();

        return redirect()->back();

    }

    public function search_data(Request $request){

        $search_data = $request->search;
        $product = hospital_sec::where('category','LIKE',"%$search_data%")->get();

        return view('home.home',compact('product'));
    }
}
