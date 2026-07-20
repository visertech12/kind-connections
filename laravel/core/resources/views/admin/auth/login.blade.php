<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ gs('site_name') }} - Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #0f172a;
            position: relative;
            overflow: hidden;
        }

        /* Animated background */
        .bg-glow {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .35;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }
        .bg-glow-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, #6366f1, transparent);
            top: -200px; left: -200px;
        }
        .bg-glow-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, #8b5cf6, transparent);
            bottom: -150px; right: -150px;
            animation-delay: -4s;
        }
        .bg-glow-3 {
            width: 300px; height: 300px;
            background: radial-gradient(circle, #06b6d4, transparent);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -2s;
        }
        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, -30px); }
        }

        /* Layout */
        .login-page {
            display: flex;
            width: 100%;
            min-height: 100vh;
            z-index: 1;
        }

        /* Left panel */
        .login-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 40px;
            text-align: center;
        }
        .login-left__logo {
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 48px;
        }
        .login-left__logo img {
            max-width: 250px;
            max-height: 80px;
        }
        .login-left__tagline {
            font-size: 2.2rem; font-weight: 800;
            color: #fff;
            line-height: 1.2;
            max-width: 420px;
            margin-bottom: 16px;
        }
        .login-left__tagline span {
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .login-left__desc {
            font-size: .92rem; color: #94a3b8;
            max-width: 340px; line-height: 1.7;
        }

        /* Feature list */
        .login-features {
            margin-top: 40px;
            display: flex; flex-direction: column; gap: 14px;
            text-align: left; width: 100%; max-width: 340px;
        }
        .login-feature {
            display: flex; align-items: center; gap: 14px;
        }
        .login-feature__icon {
            width: 36px; height: 36px; border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: .85rem; flex-shrink: 0;
        }
        .login-feature__text { font-size: .84rem; color: #94a3b8; font-weight: 500; }

        /* Right panel — Form */
        .login-right {
            width: 480px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .login-card {
            background: rgba(255,255,255,.05);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 20px;
            padding: 42px;
            width: 100%;
        }
        .login-card__title {
            font-size: 1.5rem; font-weight: 800;
            color: #fff;
            margin-bottom: 6px;
        }
        .login-card__subtitle {
            font-size: .85rem; color: #94a3b8;
            margin-bottom: 32px;
        }

        .form-group { margin-bottom: 20px; }
        .form-label {
            display: block;
            font-size: .8rem; font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 8px;
        }
        .input-wrapper { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px; top: 50%; transform: translateY(-50%);
            color: #64748b; font-size: .9rem;
            pointer-events: none;
        }
        .form-control {
            width: 100%;
            padding: 12px 14px 12px 42px;
            background: rgba(255,255,255,.07);
            border: 1.5px solid rgba(255,255,255,.1);
            border-radius: 10px;
            font-size: .87rem;
            color: #fff;
            font-family: inherit;
            outline: none;
            transition: all .2s;
        }
        .form-control::placeholder { color: #475569; }
        .form-control:focus {
            border-color: #6366f1;
            background: rgba(99,102,241,.1);
            box-shadow: 0 0 0 3px rgba(99,102,241,.2);
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none; border-radius: 10px;
            color: #fff; font-size: .95rem; font-weight: 700;
            cursor: pointer; font-family: inherit;
            transition: all .2s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            margin-top: 8px;
            box-shadow: 0 4px 15px rgba(99,102,241,.4);
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99,102,241,.5);
        }
        .btn-login:active { transform: translateY(0); }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: .84rem;
            font-weight: 500;
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 20px;
        }
        .alert-danger { background: rgba(239,68,68,.15); color: #fca5a5; border: 1px solid rgba(239,68,68,.3); }

        /* Responsive */
        @media (max-width: 860px) {
            .login-left { display: none; }
            .login-right { width: 100%; padding: 24px 20px; }
        }
    </style>
</head>
<body>
    <!-- Background glows -->
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="bg-glow bg-glow-3"></div>

    <div class="login-page">
        <!-- Left Info Panel -->
        <div class="login-left">
            <div class="login-left__logo">
                <img src="{{ getImage('assets/images/logoIcon/logo.png') }}" alt="Site Logo">
            </div>
            <div class="login-left__tagline">Manage your <span>digital products</span> with ease</div>
            <p class="login-left__desc">A powerful admin dashboard to control products, users, and your entire platform from one place.</p>
            <div class="login-features">
                <div class="login-feature">
                    <div class="login-feature__icon" style="background:rgba(99,102,241,.2);color:#818cf8"><i class="fas fa-box"></i></div>
                    <div class="login-feature__text">Manage products & categories</div>
                </div>
                <div class="login-feature">
                    <div class="login-feature__icon" style="background:rgba(34,197,94,.2);color:#4ade80"><i class="fas fa-users"></i></div>
                    <div class="login-feature__text">View and manage all users</div>
                </div>
                <div class="login-feature">
                    <div class="login-feature__icon" style="background:rgba(6,182,212,.2);color:#22d3ee"><i class="fas fa-chart-bar"></i></div>
                    <div class="login-feature__text">Analytics & reporting dashboard</div>
                </div>
            </div>
        </div>

        <!-- Right Form Panel -->
        <div class="login-right">
            <div class="login-card">
                <div class="login-card__title">Welcome back 👋</div>
                <div class="login-card__subtitle">Sign in to your admin account</div>

                @if(session('error'))
                    <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" value="{{ old('username') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
