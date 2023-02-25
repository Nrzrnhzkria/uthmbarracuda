@extends('layouts.admin')

@section('title')
    Coaches
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Coach</h1>
    @if(Auth::user()->is_admin == 0)
    @else
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#create-coach"><i class="bi bi-plus-lg pr-2"></i>New Coach</button>
            <!-- Modal -->
            <div class="modal fade" id="create-coach" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="/store-coach" method="post">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Coach</h5>
                                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="text" class="col-4 col-form-label">First Name</label> 
                                    <div class="col-8">
                                        <input name="first_name" placeholder="Eg. John" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-4 col-form-label">Last Name</label> 
                                    <div class="col-8">
                                        <input name="last_name" placeholder="Eg. Doe" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-4 col-form-label">IC No.</label> 
                                    <div class="col-8">
                                        <input name="ic_no" placeholder="Eg. 941001014091" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-4 col-form-label">Email</label> 
                                    <div class="col-8">
                                        <input name="email" placeholder="Eg. name@example.com" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save2 pr-1"></i> Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="float-right pt-3">{{ $coaches->links() }}</div>
        @if(count($coaches) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        @if(Auth::user()->is_admin == 0)
                        @else
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coaches as $key => $coach)
                    <tr>
                        <th scope="row">{{ $coaches->firstItem() + $key }}</th>
                        <td>{{ $coach->first_name }}</td>
                        <td>{{ $coach->last_name }}</td>
                        <td>{{ $coach->email }}</td>
                        @if(Auth::user()->is_admin == 0)
                        @else
                            <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal{{ $coach->user_id }}"><i class="bi bi-trash"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $coach->user_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <p>Are you sure you want to delete this coach ?</p>
                                                    <ul>
                                                        <li>{{ $coach->first_name }} {{ $coach->last_name }}</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                    <a class="btn btn-sm btn-danger" href="{{ url('delete-coach') }}/{{ $coach->user_id }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        @endif
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
          <p>There are no coach to display.</p>
        @endif
    </div>
</div>

<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');

        var copyText = document.getElementById(id);

        alert("Copied the text: " + copyText.value);
    }
</script>
@endsection