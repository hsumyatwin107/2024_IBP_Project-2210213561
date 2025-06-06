<?php

namespace App\Http\Controllers;
use App\Models\Hospital_sec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\user_m;
use App\Models\Scholarship;


class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if ($usertype == '1'){

            return view('admin.home');
        }
        else{
            
            $scholarships = Scholarship::all();
            return view('student.home', compact('scholarships'));
        }
    }

    public function index()
    {
        
        $scholarships = Scholarship::all(); 
        return view('home.home', compact('scholarships'));
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

    public function about()
    {
        return view('home.about');
    }
    public function home()
{
    $socialLinks = [
        'facebook' => 'https://www.facebook.com/your-page',
        'instagram' => 'https://www.instagram.com/your-page',
        'twitter' => 'https://twitter.com/your-page',
        'linkedin' => 'https://www.linkedin.com/in/your-page',
    ];

    return view('home', compact('socialLinks'));
}

}
