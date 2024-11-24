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
            <tr>
                <th scope="row">1</th>
                <td>Server 1</td>
                <td>Apache, PHP 8</td>
                <td>123456789 - Hernanda</td>
                <td>14</td>
                <td>
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
