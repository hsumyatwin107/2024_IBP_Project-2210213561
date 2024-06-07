<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hospital_sec;
use App\Models\User;
use App\Models\user_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function user_messages(){

        $message = user_m::all();

        return view('admin.user_messages',compact('message'));
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

    public function add_h_m(Request $request){

        $product = new Hospital_sec();

        $product->doctor_name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message','The section has been added successfully');


    }

    public function show_h_m(){

        $product = Hospital_sec::all();

        return view('admin.show_h_m',compact('product'));
    }

    public function delete_section($id){

        $product = Hospital_sec::find($id);

        $product->delete();

        return redirect()->back()->with('message','The section has been deleted successfully');

    }

    public function edit_h_m($id){

        $product = Hospital_sec::find($id);
        $category = Category::all();
        return view('admin.edit_h_m',compact('product','category'));
    }

    public function update_confirm(Request $request,$id){

        $product = Hospital_sec::find($id);

        $product->doctor_name = $request->title;
        $product->description = $request->description;
        $product->Price = $request->price;
        $product->category = $request->category;

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
