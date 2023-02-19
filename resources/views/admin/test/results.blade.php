@extends('layouts.admin')

@section('title')
    Performance Test
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Test Results</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="float-right pt-3">{{ $tests->links() }}</div>
        @if(count($tests) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $key => $test)
                    <tr>
                        <th scope="row">{{ $tests->firstItem() + $key }}</th>
                        <td>{{ $test->title }}</td>
                        <td>{{ date('d-m-Y', strtotime($test->date)) }}</td>
                        <td class="text-center">
                            <a href="{{ url('view-results') }}/{{ $test->test_id }}" class="btn btn-sm btn-dark"><i class="bi bi-chevron-right"></i></a>
                        </td>
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
          <p>There are no test to display.</p>
        @endif
    </div>
</div>

@endsection