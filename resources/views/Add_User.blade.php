@extends('layout.Layout')

@section('content')
    <form action="/users/tambah" method="post">
        @csrf

        <div class="m-3">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="name" class="form-label">Nama</label>
                </div>
                <div class="col">
                    <div class="d-flex gap-2">
                        : <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror">
                    </div>

                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="m-3">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="col">
                    <div class="d-flex gap-2">
                        : <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="m-3">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="col">
                    <div class="d-flex gap-2">
                        : <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="text-end m-3">
            <button type="submit" class="btn btn-success">Tambah User</button>
        </div>

    </form>
@endsection
