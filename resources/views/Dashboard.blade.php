@extends('layout.Layout')

@section('content')
    <div class="row text-center">
        <div class="col-sm-6 p-3">
            <div class="rounded border p-3">
                <h1 class="display-5">Total Server</h1>
                <h1 class="display-3">{{ count($server) }}</h1>
                <p>servers active</p>
                <a href="/server" class="btn btn-primary">Detail</a>
            </div>
        </div>
        <div class="col-sm-6 p-3">
            <div class="rounded border p-3">
                <h1 class="display-5">Total IP Address</h1>
                <h1 class="display-3">4</h1>
                <p>ip connected</p>
                <a href="/ip" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
@endsection
