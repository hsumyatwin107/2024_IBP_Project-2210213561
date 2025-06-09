<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\Application;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        $scholarships = Scholarship::orderBy('deadline', 'asc')->get();

        return view('admin.scholarship.index', compact('scholarships'));
    }

    public function create()
    {
        return view('admin.scholarship.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Scholarship::create($request->all());
        return redirect()->route('scholarship.index')->with('success', 'Scholarship created successfully.');
    }

    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarship.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarship.edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $scholarship->update($request->all());
        return redirect()->route('scholarship.index')->with('success', 'Scholarship updated successfully.');
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        return redirect()->route('scholarship.index')->with('success', 'Scholarship deleted successfully.');
    }
    public function apply(Request $request, $id)
{
    $user = auth()->user();
    $alreadyApplied = Application::where('user_id', $user->id)
                                 ->where('scholarship_id', $id)
                                 ->exists();

    if ($alreadyApplied) {
        return redirect()->back()->with('error', 'You have already applied to this scholarship.');
    }

    Application::create([
        'user_id' => $user->id,
        'scholarship_id' => $id,
        'full_name' => $request->input('full_name'),
        'email' => $user->email,
        
    ]);

    return redirect()->back()->with('success', 'Application submitted successfully!');
}


}
