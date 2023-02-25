<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CoachController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $coaches = User::where('is_coach', true)->orderBy('id', 'desc')->paginate(15);

        return view('admin.coach.view', compact('coaches'));
    }

    public function store(Request $request){
        $coaches = User::orderBy('id', 'desc')->first();

        User::create([
            'user_id' => 'ID' . uniqid(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->ic_no),
            'is_admin' => '1',
            'is_coach' => '1'
        ]);

        return redirect()->back()->with([
            'message' => 'New coach has been added successfully.',
            'type' => 'success'
        ]);
    }

    public function destroy($user_id)
    {
        $coach = User::where('user_id', $user_id);
        
        $coach->delete();

        return redirect()->back()->with([
            'message' => 'Coach has been deleted successfully.',
            'type' => 'danger'
        ]);
    }
}
