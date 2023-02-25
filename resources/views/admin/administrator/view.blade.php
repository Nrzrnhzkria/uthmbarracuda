@extends('layouts.admin')

@section('title')
    Administrator
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administrator</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">

        <form action="/store-admin" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-4">
                    <select class="form-select form-select-sm" name="user_id" required>
                        <option selected disabled>-- Select --</option>
                        @foreach ($users as $user)  
                            <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="col-4">
                    <button type="submit" class="btn btn-sm btn-dark"><i class="bi bi-person-plus-fill pr-1"></i> New Admin</button>
                </div>
            </div> 
        </form>
        <hr>

    </div>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="float-right pt-3">{{ $admins->links() }}</div>
        @if(count($admins) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $key => $admin)
                    <tr>
                        <th scope="row">{{ $admins->firstItem() + $key }}</th>
                        <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                        <td class="text-center">
                            @if ($admin->id == 1)
                            @else  
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal{{ $admin->user_id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $admin->user_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Remove Confirmation</h5>
                                                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                                            </div>
                                            <form action="/remove-admin" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <p>Are you sure you want to remove this admin ?</p>
                                                    <ul>
                                                        <li>
                                                            <p>{{ $admin->first_name }} {{ $admin->last_name }}</p>
                                                            <input type="hidden" name="remove_id" value="{{ $admin->user_id }}">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-sm btn-danger">Remove Admin</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
          <p>There are no admin to display.</p>
        @endif
    </div>
</div>
@endsection