@extends('layout.Layout')

@section('content')
    <form action="/ip/update/{{ $ip->slug }}" method="POST">
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
                            <option value="{{ $data->id }}" @if($ip->server_id == $data->id) selected @endif>{{ $data->hostname }}</option>
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
                    : <input type="text" name="ip" id="ip"
                        class="form-control @error('ip') is-invalid @enderror" value="{{ $ip->ip_address }}">
                </div>
                @error('ip')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Edit IP Address</button>
        </div>

    </form>
@endsection
