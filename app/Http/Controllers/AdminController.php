<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactMessages;
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
        $messages = collect([]); // Empty collection for now
        if (auth()->user()->usertype == '1') {
            // Admin sees all messages
            $messages = contactMessages::latest()->get();
            return view('admin.user_messages', compact('message')); // Admin view
        } else {
            // Student sees only their own messages
            $messages = contactMessages::where('user_id', auth()->id())->latest()->get();
            return view('student.message', compact('messages')); // Student view
        }
        // return view('admin.user_messages',compact('message'));
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
public function reply_Message(Request $request, $id)
{
    $message = ContactMessages::find($id);

    if (!$message) {
        return redirect()->back()->with('error', 'Message not found.');
    }

    $message->reply = $request->reply;
    $message->save();

    return redirect()->back()->with('message', 'Reply sent successfully!');
}


    public function updates(Request $request,$id){

//        $usertype = Auth::user()->usertype;
        $user = user::find($id);

        $user->usertype = $request->usertype;

        $user->save();

        return redirect()->back();

    }

}
