<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AthleteDetails;
use App\Models\TestResult;
use App\Models\Test;
use Rap2hpoutre\FastExcel\FastExcel;

class AthleteController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function active(){
        $users = User::where('is_active', true)->where('is_coach', false)->orderBy('id', 'desc')->paginate(15);

        return view('admin.athlete.active.view', compact('users'));
    }

    public function high_performance(){
        $users = User::where('is_highperformance', true)->orderBy('id', 'desc')->paginate(15);

        return view('admin.athlete.high_performance.view', compact('users'));
    }

    public function inactive(){
        $users = User::where('is_active', false)->orderBy('id', 'desc')->paginate(15);

        return view('admin.athlete.inactive.view', compact('users'));
    }

    public function view_details($user_id){
        $user = User::where('user_id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $user->user_id)->first();

        return view('admin.athlete.view_details', compact('user', 'athlete_details'));
    }

    public function update_details($user_id, Request $request){     

        $user = User::where('user_id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $user->user_id)->first();

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
        $user = User::where('user_id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $user->user_id)->first();

        $athlete_details->delete();
        $user->delete();

        return redirect('/dashboard')->with([
            'message' => 'Athlete has been deleted successfully.',
            'type' => 'danger'
        ]);
    }

    public function view_performance($user_id){
        $users = User::where('user_id', $user_id)->first();
        $athlete_details = AthleteDetails::where('user_id', $users->user_id)->first();
        $test_results = TestResult::orderBy('id', 'desc')->where('matric_no', $athlete_details->matric_no)->paginate(15);
        $tests = Test::all();

        return view('admin.athlete.view_performance', compact('users', 'test_results', 'tests'));
    }

    public function export_active(){

        $athletes = User::with('athlete_details')->orderBy('first_name', 'asc')->where('is_active', true)->where('is_coach', false)->get();
        
        $data = $athletes->map(function ($athlete) {
            return [
                'NAME' => $athlete->first_name . ' ' . $athlete->last_name,
                'EMAIL' => $athlete->email,
                'MATRIC NO' => optional($athlete->athlete_details)->matric_no,
                'IC NO' => optional($athlete->athlete_details)->ic_no,
                'PHONE NO' => optional($athlete->athlete_details)->phone_no,
                'GENDER' => optional($athlete->athlete_details)->gender,
                'FACULTY' => optional($athlete->athlete_details)->faculty,
            ];
        });
        
        return (new FastExcel($data))->download('athletes.xlsx');
    }

    public function export_highperformance(){

        $athletes = User::with('athlete_details')->orderBy('first_name', 'asc')->where('is_highperformance', true)->get();
        
        $data = $athletes->map(function ($athlete) {
            return [
                'NAME' => $athlete->first_name . ' ' . $athlete->last_name,
                'EMAIL' => $athlete->email,
                'MATRIC NO' => optional($athlete->athlete_details)->matric_no,
                'IC NO' => optional($athlete->athlete_details)->ic_no,
                'PHONE NO' => optional($athlete->athlete_details)->phone_no,
                'GENDER' => optional($athlete->athlete_details)->gender,
                'FACULTY' => optional($athlete->athlete_details)->faculty,
            ];
        });
        
        return (new FastExcel($data))->download('athletes.xlsx');
    }

    public function export_inactive(){

        $athletes = User::with('athlete_details')->orderBy('first_name', 'asc')->where('is_active', false)->get();
        
        $data = $athletes->map(function ($athlete) {
            return [
                'NAME' => $athlete->first_name . ' ' . $athlete->last_name,
                'EMAIL' => $athlete->email,
                'MATRIC NO' => optional($athlete->athlete_details)->matric_no,
                'IC NO' => optional($athlete->athlete_details)->ic_no,
                'PHONE NO' => optional($athlete->athlete_details)->phone_no,
                'GENDER' => optional($athlete->athlete_details)->gender,
                'FACULTY' => optional($athlete->athlete_details)->faculty,
            ];
        });
        
        return (new FastExcel($data))->download('athletes.xlsx');
    }

}
