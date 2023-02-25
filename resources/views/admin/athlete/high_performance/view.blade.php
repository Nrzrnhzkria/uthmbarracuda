@extends('layouts.admin')

@section('title')
    Athletes
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">High Performance Athletes</h1>
    <a href="/export-highperformance" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download pr-2"></i>Export</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="float-right pt-3">{{ $users->links() }}</div>
        @if(count($users) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $key }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td class="text-center">
                            <a href="{{ url('view-athlete') }}/{{ $user->user_id }}" class="btn btn-sm btn-dark"><i class="bi bi-chevron-right"></i></a>
                        </td>
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
          <p>There are no athlete to display.</p>
        @endif
    </div>
</div>

@endsection