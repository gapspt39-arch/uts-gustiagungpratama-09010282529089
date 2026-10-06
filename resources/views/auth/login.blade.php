<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Perpustakaan</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #111827, #374151);
        }

        .login-card {
            width: 420px;
            max-width: 92%;
            background: white;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .25);
            animation: login .7s ease;
        }

        @keyframes login {
            from {
                opacity: 0;
                transform: translateY(30px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .icon {
            width: 65px;
            height: 65px;
            background: #111827;
            color: white;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            font-size: 28px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-login {
            border-radius: 12px;
            padding: 12px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="icon mb-3">
            📚
        </div>

        <h3 class="text-center fw-bold">
            Perpustakaan
        </h3>

        <p class="text-center text-muted mb-4">
            Login untuk mengelola data buku
        </p>

        @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="admin@perpustakaan.test"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>
            </div>

            <button class="btn btn-dark btn-login w-100">
                Masuk
            </button>
        </form>

    </div>

</body>

</html>