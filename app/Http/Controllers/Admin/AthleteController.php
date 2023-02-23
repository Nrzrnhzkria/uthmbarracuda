<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AthleteDetails;
use App\Models\TestResult;
use App\Models\Test;

class AthleteController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all(){
        $users = User::orderBy('id', 'desc')->paginate(15);

        return view('admin.athlete.all.view', compact('users'));
    }

    public function active(){
        $users = User::where('is_active', true)->orderBy('id', 'desc')->paginate(15);

        return view('admin.athlete.active.view', compact('users'));
    }

    public function high_performance(){
        $users = User::where('is_highperformance', true)->orderBy('id', 'desc')->paginate(15);

        return view('admin.athlete.high_performance.view', compact('users'));
    }

    public function view_details($user_id){
        $user = User::where('id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $user->id)->first();

        return view('admin.athlete.view_details', compact('user', 'athlete_details'));
    }

    public function update_details($user_id, Request $request){     

        $user = User::where('id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $user->id)->first();

        if($athlete_details == NULL){

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->is_highperformance = $request->high_performance;
            $user->is_active = $request->status;
            $user->save();

            AthleteDetails::create([
                'matric_no' => $request->matric_no,
                'ic_no' => $request->ic_no,
                'phone_no' => $request->phone_no,
                'gender' => $request->gender,
                'faculty' => $request->faculty,
                'weight' => $request->weight,
                'height' => $request->height,
                'experience' => $request->experience,
                'aspirations' => $request->aspirations,
                'user_id' => $user->id,
            ]); 

        }else{

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->is_highperformance = $request->high_performance;
            $user->is_active = $request->status;
            $user->save();

            $athlete_details->matric_no = $request->matric_no;
            $athlete_details->ic_no = $request->ic_no;
            $athlete_details->phone_no = $request->phone_no;
            $athlete_details->gender = $request->gender;
            $athlete_details->faculty = $request->faculty;
            $athlete_details->weight = $request->weight;
            $athlete_details->height = $request->height;
            $athlete_details->experience = $request->experience;
            $athlete_details->aspirations = $request->aspirations;
            $athlete_details->save();
            
        }
        
        return redirect('view-athlete/' . $user_id)->with([
            'message' => 'Athlete details has been updated successfully.',
            'type' => 'success'
        ]);
    }

    public function destroy($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $user->id)->first();

        $athlete_details->delete();
        $user->delete();

        return redirect('/dashboard')->with([
            'message' => 'Athlete has been deleted successfully.',
            'type' => 'danger'
        ]);
    }

    public function view_performance($user_id){
        $users = User::where('id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $users->id)->first();
        $test_results = TestResult::orderBy('id', 'desc')->where('matric_no', $athlete_details->matric_no)->paginate(15);
        $tests = Test::all();

        return view('admin.athlete.view_performance', compact('users', 'test_results', 'tests'));
    }

}
