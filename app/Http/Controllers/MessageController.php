<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // Import the Message model
use App\Models\UserMessage; // Import the UserMessage model
use App\Mail\StudentReplyMail; // Import the StudentReplyMail class
use Illuminate\Support\Facades\Mail; // Import the Mail facade


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = collect([]); // Empty collection for now
        if (auth()->user()->usertype == '1') {
            // Admin sees all messages
            $messages = contactMessage::latest()->get();
            return view('admin.message', compact('messages')); // Admin view
        } else {
            // Student sees only their own messages
            $messages = contactMessage::where('user_id', auth()->id())->latest()->get();
            return view('student.message', compact('messages')); // Student view
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
//     public function sendReply(Request $request, $id)
// {
//     $request->validate([
//         'reply_message' => 'required|string|max:1000',
//     ]);

//     $message = ContactMessage::findOrFail($id);
//     $studentEmail = $message->email;

//     // Save reply to DB
//     $message->reply = $request->input('reply_message');
//     $message->save();

//     // Send email
//     Mail::to($studentEmail)->send(new StudentReplyMail($request->input('reply_message')));

//     return back()->with('success', 'Reply sent and saved successfully.');
// }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $message = new UserMessage();
    $message->name = $request->name;
    $message->email = $request->email;
    $message->phone = $request->phone;
    $message->message = $request->message;
    $message->save();

    return redirect()->back()->with('success', 'Message sent successfully!');
}

    // app/Http/Controllers/MessageController.php

    public function replyMessage(Request $request, $id)
    {
        $message = UserMessage::find($id);
        $message->reply = $request->reply;
        $message->save();
    
        return redirect()->back()->with('success', 'Reply sent!');
    }
    public function showContactForm()
{
    // You can filter by email if logged-in users exist
    $messages = UserMessage::all(); // or filter by user's email

    return view('student.contact', compact('messages'));
}


    // public function index()
    // {
    //     return view('student.message'); // or whatever view you want
    // }
    

    /**
     * Display the specified resource.
     */
    public function show(contactmessage $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contactmessage $message)
    {
        //
    }
    public function viewMessages()
{
    $studentId = auth()->id(); // or however you're identifying the student
    $messages = ContactMessage::where('student_id', $studentId)->get();
    return view('student.message', compact('messages'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contactmessage $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contactmessage $message)
    {
        //
    }
}
