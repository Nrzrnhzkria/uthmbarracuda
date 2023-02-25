@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Active Athletes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $active_users }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-check-fill fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            High Performance Athletes
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $high_users }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-graph-up-arrow fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Coaches
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $coaches }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Administrator</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin_users }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-file-person fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fab fa-whatsapp"></i>&nbsp; Whatsapp</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive" style="max-height:248px;">
                    <table class="table table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Whatsapp Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @foreach ($athlete_details as $athlete_detail)
                            @if ($athlete_detail->user_id == $user->user_id)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>
                                    <a href="https://wasap.my/{{ $athlete_detail->phone_no }}">wasap.my/{{ $athlete_detail->phone_no }}</a> 
                                </td>
                            </tr>  
                            @endif              
                            @endforeach        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection