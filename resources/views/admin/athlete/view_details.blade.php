@extends('layouts.admin')

@section('title')
    Athletes
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Athlete Information</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="row pb-4">
            <div class="col-md-3 pb-2">
                <div class="list-group ">
                    <a href="{{ url('view-athlete') }}/{{ $user->id }}" class="list-group-item list-group-item-secondary list-group-item-action active">Personal Details</a>
                    <a href="{{ url('view-performance') }}/{{ $user->id }}" class="list-group-item list-group-item-action">Performance</a>    
                </div> 
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Personal Details</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('update-athlete') }}/{{ $user->id }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">First Name</label> 
                                        <div class="col-8">
                                            <input name="first_name" value="{{ $user->first_name ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                        <div class="col-8">
                                            <input name="last_name" value="{{ $user->last_name ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Matric No.</label> 
                                        <div class="col-8">
                                            <input name="matric_no" value="{{ $athlete_details->matric_no ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">IC No.</label> 
                                        <div class="col-8">
                                            <input name="ic_no" value="{{ $athlete_details->ic_no ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>    

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Phone No.</label> 
                                        <div class="col-8">
                                            <input name="phone_no" value="{{ $athlete_details->phone_no ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>      

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Email</label> 
                                        <div class="col-8">
                                            <input name="email" value="{{ $user->email ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>      
     
                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Gender</label>
                                        <div class="col-8 pt-2">
                                            @if ($athlete_details->gender == 'Men')
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="genderRadio1" value="Men" required checked>
                                                    <label class="form-check-label" for="genderRadio1">Men</label>
                                                </div>
                                                <div class="form-check form-check-sm form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="genderRadio2" value="Women" required>
                                                    <label class="form-check-label" for="genderRadio2">Women</label>
                                                </div>
                                            @else
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="genderRadio3" value="Men" required>
                                                    <label class="form-check-label" for="genderRadio3">Men</label>
                                                </div>
                                                <div class="form-check form-check-sm form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="genderRadio4" value="Women" required checked>
                                                    <label class="form-check-label" for="genderRadio4">Women</label>
                                                </div>                                                
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Faculty</label> 
                                        <div class="col-8">
                                            <select class="form-select form-select-sm" aria-label="Default select example" name="faculty" required>
                                                <option selected readonly>{{ $athlete_details->faculty ?? '' }}</option>
                                                <option value="FAST">FAST</option>
                                                <option value="FKAAB">FKAAB</option>
                                                <option value="FKEE">FKEE</option>
                                                <option value="FKMP">FKMP</option>
                                                <option value="FTK">FTK</option>
                                                <option value="FPTP">FPTP</option>
                                                <option value="FPTV">FPTV</option>
                                                <option value="FSKTM">FSKTM</option>
                                                <option value="PPD">PPD</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>                  

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Weight (KG)</label> 
                                        <div class="col-8">
                                            <input name="weight" value="{{ $athlete_details->weight ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>          

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Height (CM)</label> 
                                        <div class="col-8">
                                            <input name="height" value="{{ $athlete_details->height ?? '' }}" class="form-control form-control-sm" type="text" required>
                                        </div>
                                    </div>                   

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Experience</label> 
                                        <div class="col-8">
                                            <textarea name="experience" cols="40" rows="2" class="form-control form-control-sm" required>{{ $athlete_details->experience ?? '' }}</textarea>
                                        </div>
                                    </div>                   

                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Aspiration</label> 
                                        <div class="col-8">
                                            <textarea name="aspirations" cols="40" rows="2" class="form-control form-control-sm" required>{{ $athlete_details->aspirations ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    
                                    @if(Auth::user()->is_admin == 0)
                                    @else
                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">High Performance Athlete</label>
                                        <div class="col-8 pt-2">
                                            @if ($user->is_highperformance == 1)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="high_performance" id="high_performanceRadio1" value="1" required checked>
                                                    <label class="form-check-label" for="high_performanceRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-sm form-check-inline">
                                                    <input class="form-check-input" type="radio" name="high_performance" id="high_performanceRadio2" value="0" required>
                                                    <label class="form-check-label" for="high_performanceRadio2">No</label>
                                                </div>
                                            @else
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="high_performance" id="high_performanceRadio3" value="1" required>
                                                    <label class="form-check-label" for="high_performanceRadio3">Yes</label>
                                                </div>
                                                <div class="form-check form-check-sm form-check-inline">
                                                    <input class="form-check-input" type="radio" name="high_performance" id="high_performanceRadio4" value="0" required checked>
                                                    <label class="form-check-label" for="high_performanceRadio4">No</label>
                                                </div>                                                
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">Athlete Status</label>
                                        <div class="col-8 pt-2">
                                            @if ($user->is_active == 1)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="statusRadio1" value="1" required checked>
                                                    <label class="form-check-label" for="statusRadio1">Active</label>
                                                </div>
                                                <div class="form-check form-check-sm form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="statusRadio2" value="0" required>
                                                    <label class="form-check-label" for="statusRadio2">Inactive</label>
                                                </div>
                                            @else
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="statusRadio3" value="1" required>
                                                    <label class="form-check-label" for="statusRadio3">Active</label>
                                                </div>
                                                <div class="form-check form-check-sm form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="statusRadio4" value="0" required checked>
                                                    <label class="form-check-label" for="statusRadio4">Inactive</label>
                                                </div>                                                
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group text-right row">
                                        <div class="offset-4 col-8">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="bi bi-save2 pr-1"></i> Update Profile
                                            </button>
                                            
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal{{ $user->id }}"><i class="bi bi-trash"></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this athlete ?</p>
                                                            <p>This table will be affected after deletion :</p>
                                                            <ul>
                                                                <li>User</li>
                                                                <li>Athlete Details</li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                            <a class="btn btn-sm btn-danger" href="{{ url('delete-athlete') }}/{{ $user->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection