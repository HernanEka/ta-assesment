@extends('layout.Layout')

@section('content')


    @if (count($server) == 0)
        <div class="text-center">
            <p>Belum Ada Server yang Terdaftar, Silahkan Tambahkan Server Terlebih Dahulu <a href="/server">Klik Disini</a>
            </p>
        </div>
    @else
        <form action="/ip/tambah" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="server" class="form-label">Pilih Server</label>
                </div>
                <div class="col">
                    <div class="d-flex gap-3">
                        : <select name="server_id" id="server" class="form-select @error('server_id') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Server</option>
                            @foreach ($server as $data)
                                <option value="{{ $data->id }}">{{ $data->hostname }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('server_id')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="ip" class="form-label">Ip Address (ipv4)</label>
                </div>
                <div class="col">
                    <div class="d-flex gap-3">
                        : <input type="text" name="ip" id="ip" class="form-control @error('ip') is-invalid @enderror">
                    </div>
                    @error('ip')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Input IP Address</button>
            </div>

        </form>
    @endif



@endsection
