<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        if (auth()->user()->usertype == '1') {
            // Admin sees all
            $applications = Application::with('scholarship', 'user')->latest()->get();
            return view('admin.application', compact('applications')); // Admin view
        } else {
            // Student sees only their own applications
            $applications = Application::with('scholarship')
                                ->where('user_id', auth()->id())
                                ->latest()->get();
            return view('student.application', compact('applications')); // Student view
        }
    }

    public function create()
    {
        $scholarships = Scholarship::all();
        return view('application.create', compact('scholarships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'scholarship_id' => 'required|exists:scholarships,id',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'scholarship_id' => $request->scholarship_id,
            'status' => 'pending'
        ]);

        return redirect()->route('application.index')->with('success', 'Application submitted.');
    }
    public function updateStatus(Request $request, Application $application)
{
    $request->validate([
        'status' => 'required|in:accepted,denied',
    ]);

    $application->status = $request->status;
    $application->save();

    return redirect()->route('application.index')->with('success', 'Application status updated.');
}
    public function show(Application $application)
    {
        return view('application.show', compact('application'));
    }

    public function edit(Application $application)
    {
        $scholarships = Scholarship::all();
        return view('application.edit', compact('application', 'scholarships'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'scholarship_id' => 'required|exists:scholarships,id',
        ]);

        $application->update([
            'scholarship_id' => $request->scholarship_id,
        ]);

        return redirect()->route('application.index')->with('success', 'Application updated.');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('application.index')->with('success', 'Application deleted.');
    }
}

