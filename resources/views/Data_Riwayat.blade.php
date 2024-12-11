@extends('layout.Layout')

@section('content')
    <table class="table table-striped-columns">
        <thead class="table-dark">
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Riwayat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $data)
                <tr>
                    <td>{{ $data->created_at }}</td>
                    <td>{!! $data->riwayat !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
