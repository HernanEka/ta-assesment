@extends('layout.Layout')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col">
            <a href="/server/add" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="col ">
            <form action="/server" method="GET">
                <div class="row g-3 justify-content-end">
                    <div class="col-auto">
                        <input type="text" name="search" class="form-control" placeholder="Search"
                            @if (isset($search)) value=" {{ $search }}" @endif>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped-columns">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Server Name</th>
                <th scope="col">Services</th>
                <th scope="col">PIC</th>
                <th scope="col">Total IP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($server as $data)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $data->hostname }}</td>
                    <td>{{ $data->services }}</td>
                    <td>{{ $data->picnik }} - {{ $data->picname }}</td>
                    <td>{{ $data->ips_count }}</td>
                    <td>
                        <a href="/server/detail/{{ $data->slug }}" class="btn btn-primary">Detail</a>
                        <a href="/server/edit/{{ $data->slug }}" class="btn btn-warning">Edit</a>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete
                        </button>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Server?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="/server/delete/{{ $data->slug }}" class="btn btn-danger">Yes</a>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
