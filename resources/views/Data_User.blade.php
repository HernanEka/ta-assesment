@extends('layout.Layout')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col">
            <a href="/users/add" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="col ">
            <form action="/users" method="GET">
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
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th class="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($user as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        @if ($data->level == 1)
                            Super Admin
                        @else
                            Admin
                        @endif
                    </td>
                    <td>
                        <a href="/users/edit/{{ $data->slug }}" class="btn btn-warning">Edit</a>
                        @if ($data->level != 1)
                            <a href="/users/delete/{{ $data->slug }}" class="btn btn-danger">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
