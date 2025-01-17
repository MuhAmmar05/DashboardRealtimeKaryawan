<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Link Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-image: url('/assets/bgsia.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh; /* Perbaikan */
            margin: 0; /* Pastikan tidak ada margin bawaan */
        }

        .navbar {
            height: 70px;
            background-color: rgba(0, 123, 255, 0.9);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .logo {
            height: 40px;
            margin-left: auto;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Pastikan tinggi minimum sesuai tinggi layar */
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            background-color: #ffffff;
            margin: 0; /* Hilangkan margin bawah tambahan */
        }

        .form-label {
            font-weight: bold;
        }

        .btn-login {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 10px;
        }

        .login-logo img {
            width: 80px;
            display: block;
            margin: 0 auto 20px auto;
        }

        footer {
            padding: 10px 0;
            font-size: 0.9rem;
            position: fixed; /* Tetap di bawah layar */
            bottom: 0;
            width: 100%;
            box-shadow: 0px -4px 8px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-flex">
            <img 
                src="/assets/astratech.png" 
                alt="Logo" 
                style="margin-left: 50px; height: 40px;" 
            />
        </div>
    </nav>

    <div class="login-container">
        <div class="login-card">
            <!-- Login Form -->
            <h3 class="text-center mb-3">Login Dashboard</h3>
            
            <!-- Error Alert -->
            <div class="alert alert-danger d-none" id="error-message">
                Username atau Password salah!
            </div>

            <form id="login-form">
                <!-- Username Field -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Masukkan username..." required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Masukkan password..." required>
                </div>

                <!-- Login Button -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-login">Login</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-white text-black text-left py-3 fw-bold">
        <p class="mb-0" style="margin-left: 50px">Copyright © 2024 - MIS Politeknik Astra</p>
    </footer>

    <!-- Link Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS (Optional: Login Validation) -->
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === 'astra' && password === 'astra') {
                alert('Login berhasil!');
                window.location.href = './dashboard'; // Arahkan ke dashboard
            } else {
                const errorMessage = document.getElementById('error-message');
                errorMessage.classList.remove('d-none');
            }
        });
    </script>

</body>
</html>