<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Dashboard') - Vamika Properties
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family:
                Inter,
                Arial,
                Helvetica,
                sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        a {
            text-decoration: none;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: 260px;
            background: #111827;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
        }

        .logo {
            height: 80px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            border-bottom: 1px solid #273142;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #d4af37;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111827;
            font-size: 20px;
            font-weight: bold;
            margin-right: 12px;
        }

        .logo-text strong {
            display: block;
            font-size: 17px;
        }

        .logo-text span {
            color: #9ca3af;
            font-size: 11px;
        }

        .sidebar-menu {
            padding: 25px 15px;
        }

        .menu-title {
            color: #6b7280;
            font-size: 11px;
            text-transform: uppercase;
            margin: 0 10px 12px;
            letter-spacing: 1px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #d1d5db;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: .2s;
        }

        .menu-item:hover,
        .menu-item.active {
            background: #1f2937;
            color: white;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        /* MAIN */

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
        }

        .topbar {
            height: 80px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .page-title h1 {
            margin: 0;
            font-size: 22px;
        }

        .page-title p {
            margin: 4px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #d4af37;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-info strong {
            display: block;
            font-size: 13px;
        }

        .user-info span {
            color: #9ca3af;
            font-size: 11px;
        }

        .content {
            padding: 30px;
        }

        /* BUTTONS */

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-primary {
            background: #111827;
            color: white;
        }

        .btn-primary:hover {
            background: #000;
        }

        .btn-gold {
            background: #d4af37;
            color: #111827;
        }

        .btn-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
        }

        /* CARDS */

        .stats-grid {
            display: grid;
            grid-template-columns:
                repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            border: 1px solid #eef0f4;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-card h3 {
            margin: 0 0 7px;
            color: #6b7280;
            font-size: 13px;
            font-weight: 500;
        }

        .stat-card strong {
            font-size: 28px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            border: 1px solid #eef0f4;
            padding: 25px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 18px;
        }

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            font-size: 12px;
            text-align: left;
            padding: 14px;
            text-transform: uppercase;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 13px;
        }

        .property-thumb {
            width: 65px;
            height: 50px;
            border-radius: 7px;
            object-fit: cover;
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        /* FORM */

        .form-card {
            max-width: 1100px;
        }

        .form-grid {
            display: grid;
            grid-template-columns:
                repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #dfe3e8;
            border-radius: 7px;
            padding: 12px 13px;
            font-size: 13px;
            outline: none;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #d4af37;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success-box {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* MOBILE */

        @media(max-width:1000px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media(max-width:700px) {

            .sidebar {
                width: 70px;
            }

            .logo-text,
            .menu-title,
            .menu-item span {
                display: none;
            }

            .logo {
                justify-content: center;
                padding: 0;
            }

            .logo-icon {
                margin: 0;
            }

            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 15px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .user-info {
                display: none;
            }

        }

    </style>

    @stack('styles')

</head>

<body>

<div class="admin-wrapper">

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                V
            </div>

            <div class="logo-text">

                <strong>Vamika</strong>

                <span>PROPERTIES</span>

            </div>

        </div>

        <div class="sidebar-menu">

            <p class="menu-title">
                Main Menu
            </p>

            <a
                href="{{ route('admin.dashboard') }}"
                class="menu-item
                {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >
                <span class="menu-icon">▣</span>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('admin.properties.index') }}"
                class="menu-item
                {{ request()->routeIs('admin.properties.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">⌂</span>
                <span>Properties</span>
            </a>

            <a
                href="{{ route('admin.properties.create') }}"
                class="menu-item"
            >
                <span class="menu-icon">+</span>
                <span>Add Property</span>
            </a>

            <p class="menu-title" style="margin-top:30px;">
                Website
            </p>

            <a
                href="{{ route('home') }}"
                target="_blank"
                class="menu-item"
            >
                <span class="menu-icon">↗</span>
                <span>View Website</span>
            </a>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="menu-item"
                    style="
                        width:100%;
                        border:0;
                        background:none;
                        cursor:pointer;
                        text-align:left;
                    "
                >
                    <span class="menu-icon">⇥</span>
                    <span>Logout</span>
                </button>

            </form>

        </div>

    </aside>

    <main class="main-content">

        <header class="topbar">

            <div class="page-title">

                <h1>
                    @yield('page-title', 'Dashboard')
                </h1>

                <p>
                    Manage your Vamika Properties website
                </p>

            </div>

            <div class="user-area">

                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </div>

        </header>

        <section class="content">

            @if(session('success'))

                <div class="success-box">
                    {{ session('success') }}
                </div>

            @endif

            @yield('content')

        </section>

    </main>

</div>

@stack('scripts')

</body>

</html>