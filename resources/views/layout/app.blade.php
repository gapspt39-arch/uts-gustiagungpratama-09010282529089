<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Perpustakaan')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #111827;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .page-content {
            animation: fadeIn .5s ease;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
            transition: .25s ease;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .btn {
            border-radius: 10px;
        }

        .table {
            vertical-align: middle;
        }

        .table tbody tr {
            transition: .2s ease;
        }

        .table tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.002);
        }

        .fade-up {
            animation: fadeUp .6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            background: #eef2ff;
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">

            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="bi bi-book-half"></i>
                Perpustakaan
            </a>

            @auth
            <div class="d-flex align-items-center gap-3">

                <a href="{{ route('books.index') }}"
                    class="text-white text-decoration-none">
                    <i class="bi bi-book"></i>
                    Buku
                </a>

                <span class="text-white-50">
                    {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button class="btn btn-sm btn-outline-light">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>

            </div>
            @endauth

        </div>
    </nav>

    <div class="container page-content">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
        @endif

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>