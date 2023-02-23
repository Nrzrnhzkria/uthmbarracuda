<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $files = File::orderBy('id', 'desc')->paginate(15);

        return view('admin.files.view', compact('files'));
    }

    public function store_file(Request $request){
        $files = File::orderBy('id', 'desc')->first();

        File::create([
            'file_name' => $request->file_name,
            'link' => $request->link
        ]);

        return redirect()->back()->with([
            'message' => 'New file has been added successfully.',
            'type' => 'success'
        ]);
    }

    public function destroy($file_id)
    {
        $file = File::where('id', $file_id);
        
        $file->delete();

        return redirect()->back()->with([
            'message' => 'File has been deleted successfully.',
            'type' => 'danger'
        ]);
    }
}
