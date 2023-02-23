@extends('layouts.admin')

@section('title')
    Performance Test
@endsection

@section('content')  

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Test</h1>
    @if(Auth::user()->is_admin == 0)
    @else
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#create-test"><i class="bi bi-plus-lg pr-2"></i>New Test</button>
            <!-- Modal -->
            <div class="modal fade" id="create-test" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="/store-test" method="post">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Test</h5>
                                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="title" class="col-4 col-form-label">Title</label> 
                                    <div class="col-8">
                                        <input name="title" placeholder="Eg. 2000 m" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-4 col-form-label">Date</label> 
                                    <div class="col-8">
                                        <input name="date" class="form-control form-control-sm" type="date" required>
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
        <div class="float-right pt-3">{{ $tests->links() }}</div>
        @if(count($tests) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Link</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $key => $test)
                    <tr>
                        <th scope="row">{{ $tests->firstItem() + $key }}</th>
                        <td>{{ $test->title }}</td>
                        <td>
                            <div class="form-group row">
                                <div class="col-8 p-0">
                                    <input type="text" id="copy_{{ $test->test_id }}" value="{{ $test->link }}" class="form-control form-control-sm" readonly>
                                </div> 
                                <div class="col-4 p-0">
                                    <button onclick="copyToClipboard('copy_{{ $test->test_id }}')" class="btn p-1"><i class="bi bi-clipboard"></i></button>
                                </div>
                            </div>                      
                        </td>
                        <td>{{ date('d M Y', strtotime($test->date)) }}</td>
                        <td class="text-center">
                            <a href="{{ url('view-results') }}/{{ $test->test_id }}" class="btn btn-sm btn-dark"><i class="bi bi-chevron-right"></i></a>

                            @if(Auth::user()->is_admin == 0)
                            @else
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal{{ $test->test_id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $test->test_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <li>Test</li>
                                                    <li>Test Results</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <a class="btn btn-sm btn-danger" href="{{ url('delete-test') }}/{{ $test->test_id }}">Delete</a>
                                            </div>
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
          <p>There are no test to display.</p>
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