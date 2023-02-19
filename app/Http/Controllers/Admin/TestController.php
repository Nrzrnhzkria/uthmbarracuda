<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;

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
        $test = Test::where('test_id', $test_id)->first();
        // $test_results = TestResults::where('test_id', $test_id)->first();

        // $test_results->delete();
        $test->delete();

        return redirect()->back()->with([
            'message' => 'Test has been deleted successfully.',
            'type' => 'danger'
        ]);
    }

    public function results(){
        $tests = Test::orderBy('id', 'desc')->paginate(15);

        return view('admin.test.results', compact('tests'));
    }
}
