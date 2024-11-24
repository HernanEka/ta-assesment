@extends('layout.Layout')

@section('content')
    <div class="mb-3">
        <h3>Primary Data</h3>

        <div class="m-3">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="hostname" class="form-label">
                        Server Hostname
                    </label>
                </div>
                <div class="col">
                    <input type="text" name="hostname" id="hostname" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="picnik" class="form-label">
                        Person In Charge NIK
                    </label>
                </div>
                <div class="col">
                    <input type="text" name="picnik" id="picnik" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="picname" class="form-label">
                        Person In Charge Name
                    </label>
                </div>
                <div class="col">
                    <input type="text" name="picname" id="picname" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="ip" class="form-label">
                        Host IP Address
                    </label>
                </div>
                <div class="col">
                    <input type="text" name="ip" id="ip" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="mb-3">
        <div class="d-flex mb-3">
            <h3>Services</h3>
            <button type="button" class="btn btn-primary ms-3" onclick="tambahService()">+ Tambah Service</button>
        </div>
        <div id="service-container"></div>
    </div>


    <hr>

    <div class="text-end">
        <div class="btn btn-success">Create Server</div>
    </div>

    <script>
        function tambahService() {
            const container = document.getElementById('service-container');

            const kotak = document.createElement('div');
            kotak.classList.add('d-flex', 'mb-3');

            const inputBaru = document.createElement('input');
            inputBaru.type = 'text';
            inputBaru.name = 'service[]';
            inputBaru.id = 'service';
            inputBaru.classList.add('form-control');

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.classList.add('btn', 'btn-danger', 'ms-3');
            deleteBtn.textContent = 'Hapus';

            deleteBtn.addEventListener('click', () => {
                container.removeChild(kotak);
            });

            kotak.appendChild(inputBaru);
            kotak.appendChild(deleteBtn);

            container.appendChild(kotak);
        }

        document.addEventListener('DOMContentLoaded', () => {
            tambahService();
        });
    </script>
@endsection
