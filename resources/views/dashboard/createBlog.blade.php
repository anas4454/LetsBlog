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
        <div class="dashboard-content w-75 p-5 overflow-auto">
            <h2 class="mb-4">Create Blog</h2>
            <form action="{{ route('dashboard.store-blog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" >
                </div>
                 <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt</label>
                    <input type="text" class="form-control" id="excerpt" name="excerpt" >
                </div>
                 <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                     <input type="file" class="form-control" id="image" name="image" >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Blog</button>
            </form>

    </div>
</body>

</html>
