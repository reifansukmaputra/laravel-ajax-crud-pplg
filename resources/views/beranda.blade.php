<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simple CRUD | {{ $title }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-
        SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m
        7" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"
        rel="stylesheet" >
        </head>
        <body>
        <div class="container-fluid">
        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" ariaexpanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="{{ url(' /') }}">Beranda</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/items') }}">Items</a>
        </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" arialabel="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
            </div>
            </nav>
            {{-- END NAVBAR --}}
            {{-- CONTENT --}}
            <h1>Halaman Beranda</h1>
            {{-- END CONTENT --}}
            </div>
            <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-
            k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
            crossorigin="anonymous"></script>
            <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-
            I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"
            integrity="sha384-
            VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+
            " crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-
            /JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js" ></script>
        </body>
</html>
