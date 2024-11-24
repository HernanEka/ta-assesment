<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Bootsrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="position-relative min-vh-100">
        <div class="position-absolute top-50 start-50 translate-middle col-sm-4">
            <div class="bg-white p-5 shadow">
                <div class="text-center" style="color: #ed1e28">
                    <h1 class="display-3 fw-bold">Login</h1>
                </div>
                <hr>
                <form action="/login/proses" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
