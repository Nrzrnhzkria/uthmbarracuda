<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\User;
use App\Models\AthleteDetails;
use PDF;

class TestController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manage(){
        $tests = Test::orderBy('id', 'desc')->paginate(15);

        return view('admin.test.manage', compact('tests'));
    }

    public function store_test(Request $request){
        $tests = Test::orderBy('id', 'desc')->first();
        
        $auto_inc = $tests->id + 1;
        $test_id = 'T' . 0 . 0 . $auto_inc;

        Test::create([
            'test_id' => $test_id,
            'title' => $request->title,
            'date' => $request->date,
            'link' => 'http://127.0.0.1:8000/test-form/' . $test_id
        ]);

        return redirect()->back()->with([
            'message' => 'New test has been created successfully.',
            'type' => 'success'
        ]);
    }

    public function destroy($test_id)
    {
        $test = Test::where('test_id', $test_id);
        $test_results = TestResult::where('test_id', $test_id);
        
        $test_results->delete();
        $test->delete();

        return redirect()->back()->with([
            'message' => 'Test has been deleted successfully.',
            'type' => 'danger'
        ]);
    }

    public function test_form($test_id){
        $test = Test::where('test_id', $test_id)->first();
        $athlete_details = AthleteDetails::orderBy('id', 'desc')->get();
        $users = User::where('is_active', 1)->get();

        return view('test_form', compact('test', 'users', 'athlete_details'));
    }

    public function store_result($test_id, Request $request){
        $image_path = 'public/admin/results';
        $path = 'img_' . uniqid() . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs($image_path, $path);
        $result_image = 'http://127.0.0.1:8000/storage/admin/results/' . $path;

        TestResult::create([
            'matric_no' => $request->matric_no,
            'result' => $request->result,
            'weight' => $request->weight,
            'image' => $result_image,
            'test_id' => $test_id
        ]);

        $athlete_details = AthleteDetails::where('matric_no', $request->matric_no)->first();

        $athlete_details->weight = $request->weight;
        $athlete_details->save();

        return redirect()->back()->with([
            'message' => 'Result has been submitted successfully.',
            'type' => 'success'
        ]);
    }

    public function results($test_id){
        $test_results = TestResult::where('test_id', $test_id)->paginate(15);
        $test = Test::where('test_id', $test_id)->first();
        $athlete_details = AthleteDetails::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.test.results', compact('test_results', 'test', 'users', 'athlete_details'));
    }

    public function destroy_result($result_id)
    {
        $test_results = TestResult::where('id', $result_id)->first();

        $test_results->delete();

        return redirect()->back()->with([
            'message' => 'Result has been deleted successfully.',
            'type' => 'danger'
        ]);
    }
}
