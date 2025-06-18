<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactMessages; // Import the ContactMessages model

class StudentController extends Controller
{
    public function index()
    {
        return view('student.scholarships');
    }
    public function showMessages()
{
    $userId = auth()->id(); // Assuming user is logged in
    $messages = ContactMessage::where('user_id', $userId)->get();
    return view('student.message', compact('messages'));
}
public function showForStudents()
{
    $scholarships = Scholarship::all();
    $appliedScholarshipIds = Application::where('user_id', auth()->id())
        ->pluck('scholarship_id')
        ->toArray(); // Optional: easier to check with `in_array`

    return view('student.scholarships', compact('scholarships', 'appliedScholarshipIds'));
}

    public function applyForm($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        return view('student.apply', compact('scholarships'));
    }
    public function myApplications()
{
    // Assuming you have student login and Auth::user() returns the logged-in student
    $applications = Application::where('user_id', Auth::id())->with('scholarships')->get();
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
        // $cvPath = $request->file('cv')->store('applications');

        // Save application
        Application::create([
            'scholarship_id' => $request->scholarship_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            // 'cv_path' => $cvPath,
        ]);

        return redirect()->route('student.scholarships')->with('success', 'Application submitted successfully!');
    }
}
