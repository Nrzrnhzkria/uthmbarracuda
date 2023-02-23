<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $admins = User::orderBy('id', 'desc')->where('is_admin', 1)->paginate(15);
        $users = User::orderBy('id', 'desc')->where('is_admin', 0)->where('is_active', 1)->get();

        return view('admin.administrator.view', compact('admins', 'users'));
    }

    public function store_admin(Request $request){     

        $user = User::where('id', $request->id)->first();

        $user->is_admin = 1;
        $user->save();
        
        return redirect()->back()->with([
            'message' => 'Admin has been added successfully.',
            'type' => 'success'
        ]);
    }

    public function remove_admin(Request $request){     

        $user = User::where('id', $request->remove_id)->first();

        $user->is_admin = 0;
        $user->save();
        
        return redirect()->back()->with([
            'message' => 'Admin has been removed successfully.',
            'type' => 'danger'
        ]);
    }
}
