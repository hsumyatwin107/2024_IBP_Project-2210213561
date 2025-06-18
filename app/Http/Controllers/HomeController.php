<?php

namespace App\Http\Controllers;

use App\Models\Hospital_sec;
use App\Models\ScholarshipNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\user_m;
use App\Models\Scholarship;
use App\Models\AboutSection;


class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $user = Auth::user();

    if (!$user->hasVerifiedEmail()) {
        return redirect()->route('verification.notice');
    }
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $scholarships = Scholarship::all();
            return view('student.home', compact('scholarships'));
        }
    }

    public function index()
    {
        $scholarships = Scholarship::all();
        $aboutSections = AboutSection::all(); 
        // $scholarshipNews = ScholarshipNews::latest()->take(5)->get(); 

        return view('home.home', compact('scholarships','aboutSections'));
    }

    public function contact()
    {
        return view('home.contact');
    }
    public function show_about_section()
    {
        $aboutSections = AboutSection::all(); 
        return view('home.home', compact('aboutSections'));
    }

    public function home()
    {
        $aboutSections = AboutSection::all(); 
        $socialLinks = [
            'facebook' => 'https://www.facebook.com/your-page',
            'instagram' => 'https://www.instagram.com/your-page',
            'twitter' => 'https://twitter.com/your-page',
            'linkedin' => 'https://www.linkedin.com/in/your-page',
        ];

        return view('home', compact('socialLinks'));
    }
}
