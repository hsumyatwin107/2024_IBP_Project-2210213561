<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    // Apply for a scholarship
    public function apply(Request $request, $scholarshipId)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'document' => 'required|file|mimes:pdf|max:2048',
        ]);

        $scholarship = Scholarship::findOrFail($scholarshipId);

        // Save file to storage/app/public/applications
        $documentPath = $request->file('document')->store('applications', 'public');

        // Save application
        $application = new Application();
        $application->user_id = Auth::id(); // assumes student is logged in
        $application->scholarship_id = $scholarship->id;
        $application->full_name = $request->full_name;
        $application->email = $request->email;
        $application->document_path = $documentPath;
        $application->status = 'pending';
        $application->save();

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }
}
