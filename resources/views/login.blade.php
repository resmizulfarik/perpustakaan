<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Perpustakaan SMA 7 Sijunjung</title>
    
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url("{{ asset('assets/img/fto2.jpeg') }}") no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        /* Glassmorphism Effect */
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 50px 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container img {
            max-height: 80px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.2));
            margin-bottom: 20px;
        }

        .login-container h2 {
            color: #ffffff;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .login-container p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            margin-bottom: 30px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            color: #f1c40f;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-left: 5px;
            letter-spacing: 1px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 15px;
            color: #fff;
            transition: 0.3s;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: none;
            color: #fff;
            border: 1px solid #f1c40f;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 38px;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.2rem;
            transition: 0.3s;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #f1c40f;
        }

        .btn-login {
            background: #f1c40f;
            color: #333;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 15px;
            transition: 0.4s;
            box-shadow: 0 10px 20px rgba(241, 196, 15, 0.2);
        }

        .btn-login:hover {
            background: #fff;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(255, 255, 255, 0.2);
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #f1c40f;
            text-decoration: underline;
        }

        /* Perbaikan Alert agar lebih rapi */
        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.4);
            color: #fff;
            font-size: 0.8rem;
            border-radius: 10px;
            text-align: left;
            margin-bottom: 20px;
        }
        
        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo SMA 7 Sijunjung">
        
        <h2>Admin Login</h2>
        <p>Akses Sistem Manajemen Perpustakaan</p>

        {{-- Alert Error yang sudah diperbaiki --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf {{-- Pastikan token ini tetap ada untuk mencegah error 419 --}}
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@sekolah.com" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
            </div>

            <button type="submit" class="btn-login">Masuk Sekarang</button>
        </form>

        <a href="/" class="back-link">← Kembali ke Halaman Utama</a>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

</body>
</html>