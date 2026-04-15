<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Capstone Global</title>
    <meta name="description" content="Secure login portal for Capstone CRM administrators.">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <style>
        :root {
            --primary: #2bbfbf;
            --heading: #000000;
            --text-main: #000000;
            --text-muted: #555555;
            --bg-body: #f6f9ff;
            --white: #ffffff;
            --border: #ebeef4;
            --danger: #ef4444;
            --success: #059669;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: "Open Sans", sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1, h2, h3, h4, h5, h6 { font-family: "Nunito", sans-serif; }

        .login-wrapper {
            width: 100%;
            max-width: 960px;
            display: flex;
            background: var(--white);
            border-radius: 5px;
            box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
            overflow: hidden;
            margin: 30px;
        }

        /* ── Left Side: Branding ── */
        .login-brand {
            flex: 0 0 380px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-brand::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 250px; height: 250px;
            background: rgba(43, 191, 191, 0.08);
            border-radius: 50%;
        }

        .login-brand::after {
            content: '';
            position: absolute;
            bottom: -60px; left: -60px;
            width: 180px; height: 180px;
            background: rgba(43, 191, 191, 0.06);
            border-radius: 50%;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
        }

        .brand-logo-icon {
            width: 42px; height: 42px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .brand-logo-icon svg { width: 22px; height: 22px; }

        .brand-logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-name {
            font-family: "Nunito", sans-serif;
            font-size: 22px;
            font-weight: 700;
        }

        .brand-sub {
            font-size: 11px;
            color: rgba(255,255,255,0.5);
            font-weight: 600;
        }

        .brand-title {
            font-family: "Nunito", sans-serif;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .brand-title span {
            color: var(--primary);
        }

        .brand-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.6);
            line-height: 1.8;
            position: relative;
            z-index: 2;
            margin-bottom: 40px;
        }

        .brand-roles {
            display: flex;
            gap: 10px;
            position: relative;
            z-index: 2;
        }

        .role-tag {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .role-tag.admin-tag {
            background: rgba(43,191,191,0.15);
            color: var(--primary);
            border: 1px solid rgba(43,191,191,0.3);
        }

        .role-tag.super-tag {
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.7);
            border: 1px solid rgba(255,255,255,0.15);
        }

        .role-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ── Right Side: Form ── */
        .login-form-side {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            font-family: "Nunito", sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--heading);
            margin-bottom: 8px;
        }

        .form-subheading {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: var(--danger);
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: var(--success);
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--heading);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #aab7cf;
            width: 18px; height: 18px;
            pointer-events: none;
            transition: color 0.2s;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            font-size: 14px;
            font-family: "Open Sans", sans-serif;
            border: 1px solid #ced4da;
            border-radius: 4px;
            color: var(--text-main);
            background: var(--white);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            outline: none;
        }

        .form-input::placeholder {
            color: #aab7cf;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(43, 191, 191, 0.15);
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--primary);
        }

        .toggle-pw {
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #aab7cf;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .toggle-pw:hover { color: var(--heading); }

        /* Submit Button */
        .btn-login {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 600;
            font-family: "Nunito", sans-serif;
            cursor: pointer;
            margin-top: 5px;
            transition: background 0.2s, transform 0.2s;
        }

        .btn-login:hover {
            background: #259e9e;
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .login-footer strong {
            color: var(--primary);
            font-weight: 700;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                margin: 15px;
            }

            .login-brand {
                flex: none;
                padding: 40px 30px;
            }

            .brand-title { font-size: 22px; }

            .login-form-side {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    <!-- Left Brand Panel -->
    <div class="login-brand">
        <div class="brand-logo">
            <div class="brand-logo-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
            </div>
            <div class="brand-logo-text">
                <span class="brand-name">Capstone Global</span>
                <span class="brand-sub">Admin Dashboard</span>
            </div>
        </div>

        <h2 class="brand-title">
            Welcome to the<br><span>Admin Portal</span>
        </h2>

        <p class="brand-desc">
            Access the CRM dashboard, manage content, leads, services, and system settings — all from a single secure login.
        </p>
    </div>

    <!-- Right Form Panel -->
    <div class="login-form-side">
        <h1 class="form-heading">Sign In</h1>
        <p class="form-subheading">Enter your credentials to access the dashboard.</p>

        @if($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" id="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    <input id="email" type="email" name="email" class="form-input" placeholder="you@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                    </svg>
                    <input id="password" type="password" name="password" class="form-input" placeholder="••••••••" required autocomplete="current-password">
                    <button type="button" class="toggle-pw" id="toggle-pw" aria-label="Toggle password visibility">
                        <svg id="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5C21.27 7.61 17 4.5 12 4.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-login" id="btn-login">
                Sign In to Dashboard
            </button>
        </form>

        <div class="login-footer">
            This portal is for <strong>Admin</strong> &amp; <strong>Super Admin</strong> use only.<br>
            Unauthorized access is strictly prohibited.
        </div>
    </div>
</div>

<script>
    const toggleBtn = document.getElementById('toggle-pw');
    const pwInput   = document.getElementById('password');
    const eyeIcon   = document.getElementById('eye-icon');
    const eyeOpen = `<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5C21.27 7.61 17 4.5 12 4.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>`;
    const eyeOff  = `<path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46A11.804 11.804 0 0 0 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>`;
    toggleBtn.addEventListener('click', () => {
        const isPassword = pwInput.type === 'password';
        pwInput.type = isPassword ? 'text' : 'password';
        eyeIcon.innerHTML = isPassword ? eyeOff : eyeOpen;
    });
    document.getElementById('login-form').addEventListener('submit', function() {
        const btn = document.getElementById('btn-login');
        btn.textContent = 'Signing in…';
        btn.disabled = true;
        btn.style.opacity = '0.7';
    });
</script>
</body>
</html>