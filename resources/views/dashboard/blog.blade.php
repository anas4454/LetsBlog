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
                        <li><a href="{{ route('home') }}"
                        class="text-decoration-none text-light d-block p-3 rounded">Home</a></li>
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
        <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
            <div class="d-flex justify-content-between align-items-center my-4">
                <h1>My Blogs</h1>
                <p class="bg-success text-white rounded">{{ session('success') }}</p>
                <a href="{{ route('dashboard.create-blog') }}"><button class="btn btn-primary">Create Blog</button></a>
            </div>

            <!-- Blog Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 d-grid  w-100 " style="grid-template-columns: repeat(3, 1fr);">

                    @if ($blogs->isNotEmpty())
                        @foreach ($blogs as $blog)
                            <div class="card m-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <p class="card-text">{{ $blog->excerpt }}</p>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach

                    @endif

                    {{-- <div class="card m-3">
                        <div class="card-body">
                            <h5 class="card-title">Blog Title</h5>
                            <p class="card-text">Blog description goes here.</p>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                    <div class="card m-3">
                        <div class="card-body">
                            <h5 class="card-title">Blog Title</h5>
                            <p class="card-text">Blog description goes here.</p>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                    <div class="card m-3">
                        <div class="card-body">
                            <h5 class="card-title">Blog Title</h5>
                            <p class="card-text">Blog description goes here.</p>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
