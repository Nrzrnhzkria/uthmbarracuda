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
                    <a href="{{ url('view-athlete') }}/{{ $users->user_id }}" class="list-group-item list-group-item-action">Personal Details</a>
                    <a href="{{ url('view-performance') }}/{{ $users->user_id }}" class="list-group-item list-group-item-secondary list-group-item-action active">Performance</a>    
                </div> 
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Athlete's Performance</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right pt-3">{{ $test_results->links() }}</div>
                                @if(count($test_results) > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date Submitted</th>
                                                <th scope="col">Test</th>
                                                <th scope="col">Weight (KG)</th>
                                                <th scope="col">Result</th>
                                                <th scope="col">Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($test_results as $key => $test_result)
                                            @foreach ($tests as $test)
                                            @if ($test->test_id == $test_result->test_id)
                                            <tr>
                                                <th scope="row">{{ $test_results->firstItem() + $key }}</th>
                                                <td>{{ date('d M Y', strtotime($test_result->created_at)) }}</td>
                                                <td>{{ $test->title }}</td>
                                                <td>{{ $test_result->weight }}</td>
                                                <td>{{ $test_result->result }}</td>
                                                <td>
                                                    <div class="form-group row-fluid">
                                                        <div class="col-8">
                                                            <input type="text" value="{{ $test_result->image }}" class="form-control form-control-sm" readonly>
                                                        </div> 
                                                        <div class="col-4">
                                                            <a href="{{ $test_result->image }}" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
                                                        </div>
                                                    </div> 
                                                </td>
                                            </tr>     
                                            @endif   
                                            @endforeach 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <p>There are no result to display.</p>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection