<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.home');
    }

    public function showScholarships()
    {
        $scholarships = Scholarship::all();
        return view('student.scholarships', compact('scholarships'));
    }

    public function applyForm($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('student.apply', compact('scholarship'));
    }
    public function myApplications()
{
    // Assuming you have student login and Auth::user() returns the logged-in student
    $applications = Application::where('user_id', Auth::id())->with('scholarship')->get();
    return view('student.my_applications', compact('applications'));
}
    public function submitApplication(Request $request)
    {
        $request->validate([
            'scholarship_id' => 'required|exists:scholarships,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf,docx|max:2048'
        ]);

        // Save uploaded CV
        $cvPath = $request->file('cv')->store('applications');

        // Save application
        Application::create([
            'scholarship_id' => $request->scholarship_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'cv_path' => $cvPath,
        ]);

        return redirect()->route('student.scholarships')->with('success', 'Application submitted successfully!');
    }
}
