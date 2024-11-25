@extends('layout.Layout')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col">
            <a href="/ip/add" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="col ">
            <form action="/ip" method="GET">
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
                <th scope="col">Ip Address</th>
                <th scope="col">Server</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($ip as $data)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $data->ip_address }}</td>
                    <td>{{ $data->server->hostname }}</td>
                    <td>
                        <a href="/server/detail/{{ $data->server->slug }}" class="btn btn-primary">Detail</a>
                        <a href="/ip/edit/{{ $data->slug }}" class="btn btn-warning">Edit</a>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete
                        </button>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete IP Address?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="/ip/delete/{{ $data->slug }}" class="btn btn-danger">Yes</a>
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
