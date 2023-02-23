@extends('layouts.admin')

@section('title')
    Files
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Files</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#create-file"><i class="bi bi-plus-lg pr-2"></i>New File</button>
        <!-- Modal -->
        <div class="modal fade" id="create-file" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="/store-file" method="post">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New File</h5>
                            <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">File Name</label> 
                                <div class="col-8">
                                    <input name="file_name" placeholder="Eg. Gambar VBR" class="form-control form-control-sm" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-4 col-form-label">Link</label> 
                                <div class="col-8">
                                    <input name="link" class="form-control form-control-sm" type="text" required>
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
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="float-right pt-3">{{ $files->links() }}</div>
        @if(count($files) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Link</th>
                        <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $key => $file)
                    <tr>
                        <th scope="row">{{ $files->firstItem() + $key }}</th>
                        <td>{{ $file->file_name }}</td>
                        <td>
                            <div class="form-group row">
                                <div class="col-8">
                                    <input type="text" value="{{ $file->link }}" class="form-control form-control-sm" readonly>
                                </div> 
                                <div class="col-4">
                                    <a href="{{ $file->link }}" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>    
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal{{ $file->id }}"><i class="bi bi-trash"></i></button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $file->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p>Are you sure you want to delete this file's link ?</p>
                                            <ul>
                                                <li>
                                                    <p>{{ $file->file_name }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-sm btn-danger" href="{{ url('delete-file') }}/{{ $file->id }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
          <p>There are no file to display.</p>
        @endif
    </div>
</div>
@endsection