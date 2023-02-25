@extends('layouts.app')

@section('title')
    Test Form | 
@endsection

@section('content')

<div class="container">
    <form action="{{ url('store-result') }}/{{ $test->test_id }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row justify-content-center">
            <div class="col-md-5">
                @if(session()->has('message'))
                    <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button class="close" type="button" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-top-danger shadow h-100 p-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-uppercase mb-3">
                                    Result For {{ $test->title }}
                                </div>
                                <hr>
                                <div class="text-xs mb-0">
                                    Please fill in the details below.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-3">
            <div class="col-md-5">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="matric_no" class="form-label">Matric no.</label>
                            <select class="form-select form-select-sm" aria-label="Default select example" name="matric_no" required>
                                <option selected disabled>-- Select --</option>
                                @foreach ($users as $user)  
                                @foreach ($athlete_details as $athlete_detail)  
                                @if ($athlete_detail->user_id == $user->user_id)
                                    <option value="{{ $athlete_detail->matric_no }}">{{ $athlete_detail->matric_no }}</option>
                                @endif                                    
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (KG)</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Eg. 59.3" name="weight" required>
                        </div>
                        <div class="mb-3">
                            <label for="result" class="form-label">Result</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Eg. 7:50.2" name="result" required>
                        </div>
                        <div class="mb-3">
                            <label for="img_name" class="form-label">Proof of Result</label>
                            <input class="form-control form-control-sm" name="image" type="file" required>
                            <em style="font-size: 10pt;">File format: png, jpg, heic (Image size must below 1MB)</em><br>
                        </div>
                        
                        <div class="text-end">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
    
@endsection