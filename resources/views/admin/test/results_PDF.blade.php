
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Test Results ({{ $title }})</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Athlete</th>
                        <th scope="col">Weight (KG)</th>
                        <th scope="col">Result</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $first_name }} {{ $last_name }}</td>
                        <td>{{ $weight }}</td>
                        <td>{{ $result }}</td>
                        <td>{{ $image }}</td>
                    </tr>  
                </tbody>
            </table>
        </div>
    </div>
</div>