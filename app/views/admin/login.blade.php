<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin | Quán Nhậu Anh Em</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #090a0f;
            --bg-card: rgba(20, 22, 33, 0.65);
            --border-glow: rgba(255, 168, 39, 0.25);
            --accent-orange: #ffa827;
            --accent-gradient: linear-gradient(135deg, #ffa827, #f77f00);
            --text-light: #f3f4f6;
            --text-gray: #9ca3af;
            --danger-red: #ef4444;
            --success-green: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            background-image: 
                radial-gradient(at 10% 20%, rgba(255, 168, 39, 0.08) 0px, transparent 50%),
                radial-gradient(at 90% 80%, rgba(247, 127, 0, 0.08) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow: hidden;
            position: relative;
        }

        /* Ambient animated circles in the background */
        .ambient-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 1;
            opacity: 0.5;
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            background: var(--accent-orange);
            top: -100px;
            left: -100px;
            animation: float-slow 15s infinite alternate;
        }

        .circle-2 {
            width: 400px;
            height: 400px;
            background: #f77f00;
            bottom: -150px;
            right: -100px;
            animation: float-slow 20s infinite alternate-reverse;
        }

        @keyframes float-slow {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(40px, 30px) scale(1.1); }
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
        }

        /* Glassmorphism Card styling */
        .login-card {
            background: var(--bg-card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.5),
                0 0 50px rgba(255, 168, 39, 0.05);
            transition: all 0.4s ease;
        }

        .login-card:hover {
            border-color: rgba(255, 168, 39, 0.2);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.6),
                0 0 60px rgba(255, 168, 39, 0.08);
        }

        /* Brand / Header info */
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-logo {
            width: 72px;
            height: 72px;
            background: var(--accent-gradient);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #fff;
            font-weight: 800;
            box-shadow: 0 10px 25px rgba(255, 168, 39, 0.35);
            margin-bottom: 16px;
        }

        .login-title {
            color: var(--text-light);
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .login-subtitle {
            color: var(--text-gray);
            font-size: 13px;
            font-weight: 400;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .form-label {
            display: block;
            color: var(--text-light);
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 8px;
            padding-left: 2px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 16px;
            transition: color 0.3s;
        }

        .form-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            padding: 14px 16px 14px 46px;
            border-radius: 12px;
            font-size: 14.5px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: var(--accent-orange);
            background: rgba(0, 0, 0, 0.4);
            box-shadow: 0 0 12px rgba(255, 168, 39, 0.15);
        }

        .form-input:focus + .input-icon {
            color: var(--accent-orange);
        }

        /* Custom Show/Hide Password button */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            cursor: pointer;
            font-size: 15px;
            transition: color 0.3s;
            background: none;
            border: none;
            outline: none;
        }

        .password-toggle:hover {
            color: var(--text-light);
        }

        /* Action elements */
        .btn-submit {
            width: 100%;
            background: var(--accent-gradient);
            border: none;
            color: #fff;
            padding: 14px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 20px rgba(255, 168, 39, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 168, 39, 0.35);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Alerts system */
        .alert-box {
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13.5px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            animation: fadeIn 0.3s ease;
            line-height: 1.4;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: var(--danger-red);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.25);
            color: var(--success-green);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .back-to-home {
            text-align: center;
            margin-top: 24px;
        }

        .back-to-home a {
            color: var(--text-gray);
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .back-to-home a:hover {
            color: var(--accent-orange);
        }
    </style>
</head>
<body>
    <!-- Background Circles -->
    <div class="ambient-circle circle-1"></div>
    <div class="ambient-circle circle-2"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="brand-logo">
                    <i class="fas fa-beer-mug-empty"></i>
                </div>
                <h2 class="login-title">Quán Nhậu Anh Em</h2>
                <p class="login-subtitle">Hệ thống quản lý Admin chuyên nghiệp</p>
            </div>

            <!-- Flash Alert Messages -->
            @if(isset($_SESSION['errors']))
                <div class="alert-box alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    <div>{{ $_SESSION['errors'] }}</div>
                </div>
                <?php unset($_SESSION['errors']); ?>
            @endif

            @if(isset($_SESSION['success']))
                <div class="alert-box alert-success">
                    <i class="fas fa-circle-check"></i>
                    <div>{{ $_SESSION['success'] }}</div>
                </div>
                <?php unset($_SESSION['success']); ?>
            @endif

            <form action="{{ BASE_URL }}login" method="POST">
                <div class="form-group">
                    <label class="form-label" for="username">Tên tài khoản</label>
                    <div class="input-wrapper">
                        <input class="form-input" type="text" id="username" name="username" placeholder="Nhập username..." required autocomplete="username">
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Mật khẩu</label>
                    <div class="input-wrapper">
                        <input class="form-input" type="password" id="password" name="password" placeholder="Nhập mật khẩu..." required autocomplete="current-password">
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="password-toggle" id="passwordToggle" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Đăng nhập <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="back-to-home">
                <a href="{{ BASE_URL }}">
                    <i class="fas fa-arrow-left"></i> Quay lại trang chủ website
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("toggleIcon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
