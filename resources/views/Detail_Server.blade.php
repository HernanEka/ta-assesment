@extends('layout.Layout')

@section('content')

    <div class="mb-3">
        <p>Hostname : <b>{{ $server->hostname }}</b></p>
        <p>PIC : <b>{{ $server->picnik }} - {{ $server->picname }}</b></p>
        <p>Services : </p>
        <ul>
            @foreach ($services as $data)
            <li>{{ $data }}</li>
            @endforeach
        </ul>
    </div>
    <hr>

    <div class="mb-3">
        <p>IP Address Server : <b>{{ $ip_server->ip_address }}</b></p>

        <p>Connected IP Address :</p>
        <ul>
            @foreach ($ip_host as $ip)
                <li>{{ $ip->ip_address }}</li>
            @endforeach
        </ul>
    </div>

@endsection
