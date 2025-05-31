<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hospital_sec;
use App\Models\User;
use App\Models\user_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class AdminController extends Controller
{ 


    public function user_messages(){

        $message = user_m::all();

        return view('admin.user_messages',compact('message'));
    }
    public function viewApplications()
{
    $applications = Application::latest()->get(); // or use pagination if needed
    return view('admin.applications', compact('applications'));
}
    public function delete_message($id){

        $message = user_m::find($id);

        $message->delete();

        return redirect()->back();
    }

    public function users(){

        $usertype = Auth::user()->usertype;
        $users = user::all();

        return view('admin.users',compact('usertype','users'));
    }

    public function delete_user($id){

        $user = user::find($id);

        $user->delete();

        return redirect()->back();
    }
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending,Reviewed,Accepted,Rejected',
    ]);

    $application = Application::findOrFail($id);
    $application->status = $request->status;
    $application->save();

    return redirect()->back()->with('success', 'Status updated successfully!');
}
    public function updates(Request $request,$id){

//        $usertype = Auth::user()->usertype;
        $user = user::find($id);

        $user->usertype = $request->usertype;

        $user->save();

        return redirect()->back();

    }

}
