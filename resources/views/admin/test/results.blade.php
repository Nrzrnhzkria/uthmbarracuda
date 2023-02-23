@extends('layouts.admin')

@section('title')
    Performance Test
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Test Results ({{ $test->title }})</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="float-right pt-3">{{ $test_results->links() }}</div>
        @if(count($test_results) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Athlete</th>
                        <th scope="col">Weight (KG)</th>
                        <th scope="col">Result</th>
                        <th scope="col">Image</th>
                        @if(Auth::user()->is_admin == 0)
                        @else
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($test_results as $key => $test_result)
                    @foreach ($users as $user)  
                    @foreach ($athlete_details as $athlete_detail) 
                    @if ($user->id == $athlete_detail->user_id)
                    @if ($athlete_detail->matric_no == $test_result->matric_no)
                    <tr>
                        <th scope="row">{{ $test_results->firstItem() + $key }}</th>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
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
                        @if(Auth::user()->is_admin == 0)
                        @else
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal{{ $test_result->id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $test_result->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <p>Are you sure you want to delete this test ?</p>
                                                <p>This table will be affected after deletion :</p>
                                                <ul>
                                                    <li>Test Results</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <a class="btn btn-sm btn-danger" href="{{ url('delete-result') }}/{{ $test_result->id }}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>  
                    @endif
                    @endif
                    @endforeach           
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

@endsection