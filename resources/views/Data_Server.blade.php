@extends('layout.Layout')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col">
            <a href="/server/add" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="col ">
            <form action="" method="GET">
                <div class="row g-3 justify-content-end">
                    <div class="col-auto">
                        <input type="text" name="search" class="form-control" placeholder="Search">
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
                $i = 1
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
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
