<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for maintaining specific styles not covered by Bootstrap */
        body {
            height: 100vh;
            background-color: white;
            font-family: Arial, sans-serif;
        }

        .login-container {
            max-width: 600px;
        }

        .login-title {
            font-size: 60px;
            font-weight: bold;
            color: #295A3F;
            margin-bottom: 40px;
            padding-bottom: 30px;
        }

        .inputLogin input {
            font-size: 32px;
            border: 6px solid #295A3F;
            border-radius: 10px;
            color: #295A3F;
            background-color: white;
        }

        .inputLogin input::placeholder {
            color: #295A3F;
        }

        .inputLogin button {
            font-size: 32px;
            font-weight: bold;
            color: white;
            background-color: #295A3F;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .inputLogin button:hover {
            background-color: #1e4633;
        }

        .signup-container p {
            font-size: 24px;
            color: black;
        }

        .signup-container button {
            font-size: 24px;
            color: #295A3F;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: underline;
            font-weight: bold;
        }

        .signup-container button:hover {
            color: #1e4633;
        }

        .image-container img {
            object-fit: cover;
        }

        /* Media Queries for mobile responsiveness */
        @media (max-width: 768px) {
            .row {
                display: flex;
                flex-direction: column-reverse; /* Gambar di atas form login */
            }

            .image-container {
                height: 100vh; /* Menutupi seluruh tinggi layar */
            }

            .login-container {
                padding: 20px;
                text-align: center;
            }

            .login-title {
                font-size: 40px;
            }

            .inputLogin input, .inputLogin button {
                font-size: 24px;
            }

            .signup-container p, .signup-container button {
                font-size: 18px;
            }
        }

    </style>
</head>
<body>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Login Form Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="login-container">
                    <div class="login-title">Daftar</div>

                    <form class="inputLogin">
                        <div class="form-group">
                            <input type="text" class="form-control p-3" placeholder="Masukkan Nama Pengguna" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control p-3" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control p-3" placeholder="Masukkan Kata Sandi" required>
                        </div>
                        <button type="submit" class="btn btn-block">Daftar</button>
                    </form>

                    <!-- Signup Section -->
                    <div class="signup-container d-flex align-items-center mt-4">
                        <p class="mb-0">Sudah memiliki akun?</p>
                        <button type="button" class="btn p-0 ml-2">Masuk</button>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-md-6 p-0">
                <div class="image-container h-100">
                    <img src="/images/login/bambu.jpg" alt="Gambar Bambu" class="w-100 h-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
