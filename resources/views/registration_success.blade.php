@extends('layouts.app')

@section('title')
    Registration Form | 
@endsection

@section('content')

<div class="container">

    <div class="row justify-content-center py-5">
        <div class="col-md-4 text-center">
            <p class="py-4">Your registration has been submitted successfully!</p>
            <i class="fa-regular fa-circle-check fa-10x text-success"></i>
            <p class="pt-5">Please join our group whatsapp to get notification for the latest update.</p>
            <a href="https://chat.whatsapp.com/FF6AsHIsBbX1kJzwgzpEgc" class="btn btn-primary"><i class="fab fa-whatsapp"></i>&nbsp; Group Whatsapp</a>
            <br><br>
            <a href="/" class="pt-2">Back to main page</a>
        </div>
    </div>

</div>
    
@endsection