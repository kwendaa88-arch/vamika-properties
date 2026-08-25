<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Login - Vamika Properties
    </title>

    <style>

        * {
            box-sizing:border-box;
        }

        body {
            margin:0;
            min-height:100vh;
            font-family:
                Arial,
                Helvetica,
                sans-serif;
            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1f2937
                );
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .login-wrapper {
            width:100%;
            max-width:1000px;
            display:grid;
            grid-template-columns:1fr 1fr;
            background:white;
            border-radius:18px;
            overflow:hidden;
            box-shadow:
                0 25px 70px rgba(0,0,0,.35);
        }

        .login-brand {
            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #374151
                );
            color:white;
            padding:60px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .brand-logo {
            width:65px;
            height:65px;
            background:#d4af37;
            color:#111827;
            border-radius:15px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:32px;
            font-weight:bold;
            margin-bottom:25px;
        }

        .login-brand h1 {
            font-size:38px;
            margin:0 0 12px;
        }

        .login-brand p {
            color:#d1d5db;
            line-height:1.7;
        }

        .features {
            margin-top:30px;
        }

        .feature {
            margin-bottom:15px;
            color:#e5e7eb;
        }

        .login-form {
            padding:60px;
        }

        .login-form h2 {
            margin:0;
            font-size:28px;
        }

        .login-form p {
            color:#9ca3af;
            margin-bottom:30px;
        }

        .form-group {
            margin-bottom:20px;
        }

        label {
            display:block;
            font-size:13px;
            font-weight:bold;
            margin-bottom:8px;
        }

        input {
            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:8px;
            outline:none;
        }

        input:focus {
            border-color:#d4af37;
        }

        .login-button {
            width:100%;
            border:0;
            background:#111827;
            color:white;
            padding:14px;
            border-radius:8px;
            cursor:pointer;
            font-weight:bold;
            font-size:14px;
        }

        .login-button:hover {
            background:#000;
        }

        .error {
            background:#fee2e2;
            color:#991b1b;
            padding:12px;
            border-radius:8px;
            margin-bottom:20px;
            font-size:13px;
        }

        @media(max-width:700px) {

            .login-wrapper {
                grid-template-columns:1fr;
                margin:20px;
            }

            .login-brand {
                padding:35px;
            }

            .login-brand h1 {
                font-size:28px;
            }

            .login-form {
                padding:35px;
            }

        }

    </style>

</head>

<body>

<div class="login-wrapper">

    <div class="login-brand">

        <div class="brand-logo">
            V
        </div>

        <h1>
            Vamika Properties
        </h1>

        <p>
            Professional property management
            made simple.
        </p>

        <div class="features">

            <div class="feature">
                ✓ Manage your properties
            </div>

            <div class="feature">
                ✓ Upload multiple property photos
            </div>

            <div class="feature">
                ✓ Manage property availability
            </div>

            <div class="feature">
                ✓ Showcase properties online
            </div>

        </div>

    </div>

    <div class="login-form">

        <h2>
            Welcome Back
        </h2>

        <p>
            Sign in to your admin dashboard.
        </p>

        @if($errors->any())

            <div class="error">

                {{ $errors->first() }}

            </div>

        @endif

        <form
            method="POST"
            action="{{ route('login') }}"
        >

            @csrf
             <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

                <label>
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@vamikaproperties.com"
                    required
                    autofocus
                >

            </div>

            <div class="form-group">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>

            <div
                style="
                    display:flex;
                    gap:8px;
                    margin-bottom:20px;
                    font-size:13px;
                "
            >

                <input
                    type="checkbox"
                    name="remember"
                    style="width:auto;"
                >

                Remember me

            </div>

            <button
                type="submit"
                class="login-button"
            >
                Sign In
            </button>

        </form>

    </div>

</div>

</body>

</html>
