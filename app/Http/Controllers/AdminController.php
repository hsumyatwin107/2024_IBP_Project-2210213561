<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Hospital_sec;
use App\Models\User;
use App\Models\user_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\AboutSection; // Import AboutSection model
use App\Mail\StudentReplyMail; // Import StudentReplyMail class
use Illuminate\Support\Facades\Mail; // Import Mail facade
use Illuminate\Support\Facades\Log; // Import Log facade

class AdminController extends Controller
{ 
    public function index(int $id = null)
    {
        $aboutSection = AboutSection::find($id);
        // If an ID is provided, edit that specific section
        if ($id) {
            $aboutSection = AboutSection::findOrFail($id);
            return view('admin.edit_h_m', compact('aboutSection'));
        }
    // e.g., show a list of about sections or a dashboard
    
    return view('admin.edit_h_m', compact('aboutSection'));
}

    public function user_messages(){

        $message = user_m::all();
        $messages = collect([]); // Empty collection for now
        if (auth()->user()->usertype == '1') {
            // Admin sees all messages
            $messages = contactMessage::latest()->get();
            return view('admin.user_messages', compact('message')); // Admin view
        } else {
            // Student sees only their own messages
            $messages = contactMessage::where('user_id', auth()->id())->latest()->get();
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
public function reply_message(Request $request, $id)
{
    $message = ContactMessage::find($id);

    if (!$message) {
        return redirect()->back()->with('error', 'Message not found.');
    }

    $message->reply = $request->reply;
    $message->save();
    Log::info('Sending email to: ' . $message->email);
    // Attempt to send the email
    try {
        Mail::to($message->email)->send(new StudentReplyMail($request->reply));
    } catch (\Exception $e){
        Log::error('Mail sending failed: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Mail sending failed: ' . $e->getMessage());
    }
    return redirect()->back()->with('success', 'Reply sent and email delivered.');

}


    public function updates(Request $request,$id){

//        $usertype = Auth::user()->usertype;
        $user = user::find($id);

        $user->usertype = $request->usertype;

        $user->save();

        return redirect()->back();

    }
    public function category(){

        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){

        $data = new category;
        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message','category added successfully');
    }

    public function delete_category($id){

        $data=Category::find($id);

        $data->delete();

        return redirect()->back()->with('message','category deleted successfully');
    }

    public function view_h_m(){

        $category = Category::all();
        return view('admin.h_m',compact('category'));
    }

    public function add_h_m(Request $request)
{
    $product = new AboutSection();

    $product->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('storage.about', 'public');
        $product->image = $image;
    }

    $product->save();

    return redirect()->back()->with('message','The section has been added successfully');
}


    public function show_h_m(){

        $product = AboutSection::all();

        return view('admin.show_h_m',compact('product'));
    }

    public function delete_section($id){

        $product = AboutSection::find($id);

        $product->delete();

        return redirect()->back()->with('message','The section has been deleted successfully');

    }

    public function edit_h_m($id){

        $product = AboutSection::find($id);
        $category = Category::all();
        return view('admin.edit_h_m',compact('product','category'));
    }

    public function update_confirm(Request $request,$id){

        $product = AboutSection::find($id);
        $product->description = $request->description;
        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Section has been updated successfully');

    }
}