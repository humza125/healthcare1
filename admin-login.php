<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - HealthCare Pro</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f5f8ff;
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .login-header {
            background: #0e839b ;
            color: #fff;
            padding: 32px 0 16px 0;
            text-align: left;
        }
        .login-header .title {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .login-container {
            max-width: 400px;
            margin: 40px auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 24px rgba(33, 150, 243, 0.08);
            padding: 36px 28px 28px 28px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .admin-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .admin-icon .fa-shield-halved {
            font-size: 2.5rem;
            color: #2196F3;
            background: #e3f2fd;
            border-radius: 50%;
            padding: 18px;
            box-shadow: 0 2px 8px rgba(33,150,243,0.08);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 18px;
            color: #001f4d;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-group svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #2196F3;
            opacity: 0.8;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #b0bec5;
            border-radius: 7px;
            font-size: 1rem;
            background: #f5f8ff;
            transition: border 0.2s;
        }
        .login-form input:focus {
            border-color: #2196F3;
            outline: none;
            background: #fff;
        }
        .login-form button {
            width: 100%;
            padding: 12px;
            background: #2196F3;
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 8px;
        }
        .login-form button:hover {
            background: #1769aa;
        }
        .form-footer {
            text-align: center;
        }
        .form-footer a {
            color: #2196F3;
            text-decoration: none;
            font-size: 0.97rem;
        }
        
        @media (max-width: 500px) {
            .login-container {
                max-width: 95vw;
                padding: 24px 8px 18px 8px;
            }
            .login-header {
                padding: 24px 0 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <span class="title">HealthCare Pro</span>
        </div>
        <div class="login-container">
            <div class="admin-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h2>Admin Login</h2>
            <form class="login-form" action="admin-dashboard.php" method="post" autocomplete="on">
                <div class="input-group">
                    <!-- Email/User Icon SVG -->
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c0-4 8-4 8-4s8 0 8 4"/>
                    </svg>
                    <input type="text" id="admin-username" name="username" placeholder="Username or Email" required autocomplete="username">
                </div>
                <div class="input-group">
                    <!-- Password Icon SVG -->
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="11" width="18" height="10" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input type="password" id="admin-password" name="password" placeholder="Password" required autocomplete="current-password">
                </div>
                <button type="submit">Login</button>
                <div class="form-footer">
                    <a href="index.html">← Back to Home</a>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 HealthCare Pro. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
