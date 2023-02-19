@extends('layouts.app')

@section('title')
    Registration Form | 
@endsection

@section('content')

<div class="container">
    <form action="/store-form" method="post">
        @csrf

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-top-danger shadow h-100 p-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-uppercase mb-3">
                                    Registration for UTHM Barracuda rowing team
                                </div>
                                <hr>
                                <div class="text-xs mb-0">
                                    Please fill in the details below as information for the management
                                    in searching new talent for the UTHM Baracuda Rowing Team.
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
                            <label for="email" class="form-label">Full name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" placeholder="First Name" aria-label="firstname" name="first_name" required>
                                <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" placeholder="Last Name" aria-label="lastname" name="last_name" required>
                            </div>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="matric" class="form-label">Matric no.</label>
                            <input type="text" class="form-control form-control-sm @error('matric_no') is-invalid @enderror" placeholder="Eg. HI230901" name="matric_no" required>
                            @error('matric_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ic" class="form-label">IC no.</label>
                            <input type="text" class="form-control form-control-sm @error('ic_no') is-invalid @enderror" placeholder="Eg. 020920012906" name="ic_no" required>
                            @error('ic_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_no" class="form-label">Phone no.</label>
                            <input type="text" class="form-control form-control-sm @error('phone_no') is-invalid @enderror" placeholder="Eg. 0123456789" name="phone_no" required>
                            @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Eg. name@example.com" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Men" required>
                                <label class="form-check-label" for="inlineRadio1">Men</label>
                            </div>
                            <div class="form-check form-check-sm form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Women" required>
                                <label class="form-check-label" for="inlineRadio2">Women</label>
                            </div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="faculty" class="form-label">Faculty</label>
                            <select class="form-select form-select-sm @error('faculty') is-invalid @enderror" aria-label="Default select example" name="faculty" required>
                                <option selected disabled>-- Select --</option>
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
                            @error('faculty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (KG)</label>
                            <input type="text" class="form-control form-control-sm @error('weight') is-invalid @enderror" placeholder="Eg. 59.3" name="weight" required>
                            @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (CM)</label>
                            <input type="text" class="form-control form-control-sm @error('height') is-invalid @enderror" placeholder="Eg. 168" name="height" required>
                            @error('height')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">State the sport and level you represent the highest</label>
                            <textarea class="form-control form-control-sm @error('experience') is-invalid @enderror" name="experience" placeholder="Eg. Hockey player represent UTHM in SUKIPT." rows="3" required></textarea>
                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="aspirations" class="form-label">Aspirations upon joining the UTHM Barracuda rowing team</label>
                            <textarea class="form-control form-control-sm @error('aspirations') is-invalid @enderror" name="aspirations" placeholder="Eg. To be a great student athlete which excel in both study and sport." rows="3" required></textarea>
                            @error('aspirations')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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