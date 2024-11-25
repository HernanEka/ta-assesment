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
        <div class="d-flex justify-content-between">
            <p>IP Address Server : <b>{{ $ip_server->ip_address }}</b></p>
            <a href="/ip/add?server={{ $server->slug }}" class="btn btn-primary">+ Tambah IP Address</a>
        </div>

        <p>Connected IP Address :</p>
        <ul>
            @foreach ($ip_host as $ip)
                <li>
                    {{ $ip->ip_address }}
                    <a href="/ip/edit/{{ $ip->slug }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="bi bi-trash"></i>
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
                                    <a href="/ip/delete/{{ $ip->slug }}" class="btn btn-danger">Yes</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
