<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AthleteDetails;

class RegistrationController extends Controller
{
    public function index(){
        return view('registration');
    }

    public function store(Request $request)
    {
        User::create([
            'user_id' => 'ID' . uniqid(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->ic_no),
        ]);

        $user = User::where('email', $request->email)->first();

        AthleteDetails::create([
            'matric_no' => $request->matric_no,
            'ic_no' => $request->ic_no,
            'phone_no' => '6' . $request->phone_no,
            'email' => $request->email,
            'gender' => $request->gender,
            'faculty' => $request->faculty,
            'weight' => $request->weight,
            'height' => $request->height,
            'experience' => $request->experience,
            'aspirations' => $request->aspirations,
            'user_id' => $user->user_id,
        ]);  
        
        return redirect('/registration-success');
    }

    public function success(){
        return view('registration_success');
    }
}
