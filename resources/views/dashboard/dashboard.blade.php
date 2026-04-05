<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="main d-flex w-100">
        <div class="sidebar bg-dark w-25 h-100 vh-100">
            <ul class="list-unstyled p-4">
                <li><a href="{{ route('dashboard') }}"
                        class="text-decoration-none text-light d-block p-3 rounded">Dashboard</a></li>
                <li><a href="{{ route('dashboard.blog') }}"
                        class="text-decoration-none text-light d-block p-3 rounded">Blogs</a></li>

                <li class="mt-0">
                    <form action="{{ route('logout') }}" method="Post"
                        class="text-decoration-none text-light d-block p-3 rounded">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none text-light p-0">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="dashboard-content w-75 p-5 overflow-auto">
            <h2 class="mb-4">Dashboard</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Blogs</h5>
                            <p class="card-text fs-4">24</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Liked Blogs</h5>
                            <p class="card-text fs-4">1,234</p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Favourite Blogs</h5>
                            <p class="card-text fs-4">89</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">Liked Blogs</h5>
                            <p class="card-text fs-4">156</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
