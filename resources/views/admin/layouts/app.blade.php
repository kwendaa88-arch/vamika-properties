<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel') - Vamika Properties
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        a {
            text-decoration: none;
        }

        .admin-wrapper {
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background: #111827;
            color: #fff;
            z-index: 1000;
            overflow-y: auto;
        }

        .logo {
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 22px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .logo a {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
        }

        .logo span {
            display: block;
            color: #d4af37;
            font-size: 11px;
            margin-top: 3px;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            padding: 20px 12px;
        }

        .menu-title {
            color: #6b7280;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 5px;
            border-radius: 8px;
            color: #d1d5db;
            transition: 0.2s;
        }

        .menu-item:hover,
        .menu-item.active {
            background: #1f2937;
            color: #fff;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
        }

        /* Main */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 75px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .page-heading h1 {
            font-size: 24px;
            color: #111827;
        }

        .page-heading p {
            color: #6b7280;
            font-size: 13px;
            margin-top: 4px;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #d4af37;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .admin-user-info strong {
            display: block;
            font-size: 14px;
        }

        .admin-user-info small {
            color: #6b7280;
        }

        .content {
            padding: 30px;
        }

        /* Cards */
        .card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-body {
            padding: 20px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 16px;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background: #111827;
            color: #fff;
        }

        .btn-primary:hover {
            background: #1f2937;
        }

        .btn-success {
            background: #16a34a;
            color: #fff;
        }

        .btn-danger {
            background: #dc2626;
            color: #fff;
        }

        .btn-warning {
            background: #d4af37;
            color: #111827;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        /* Tables */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover td {
            background: #fafafa;
        }

        /* Forms */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .form-control,
        select,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
            background: #fff;
            outline: none;
        }

        .form-control:focus,
        select:focus,
        textarea:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212,175,55,0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -10px;
            margin-right: -10px;
        }

        .col-6 {
            width: 50%;
            padding: 0 10px;
        }

        .col-4 {
            width: 33.333%;
            padding: 0 10px;
        }

        .col-12 {
            width: 100%;
            padding: 0 10px;
        }

        /* Alerts */
        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
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

        .badge-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        /* Property image */
        .property-thumb {
            width: 70px;
            height: 55px;
            object-fit: cover;
            border-radius: 7px;
            background: #e5e7eb;
        }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background: #fff;
            color: #374151;
            font-size: 13px;
        }

        /* Mobile */
        .mobile-menu {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 900px) {
            .sidebar {
                transform: translateX(-100%);
                transition: 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu {
                display: block;
            }

            .col-6,
            .col-4 {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .content {
                padding: 15px;
            }

            .topbar {
                padding: 0 15px;
            }

            .admin-user-info {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="admin-wrapper">

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                Vamika Properties
                <span>ADMIN PANEL</span>
            </a>
        </div>

        <div class="sidebar-menu">

            <div class="menu-title">
                Main Menu
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="menu-icon">📊</span>
                Dashboard
            </a>

            <a href="{{ route('admin.properties.index') }}"
               class="menu-item {{ request()->routeIs('admin.properties.index') ? 'active' : '' }}">
                <span class="menu-icon">🏠</span>
                Properties
            </a>

            <a href="{{ route('admin.properties.create') }}"
               class="menu-item {{ request()->routeIs('admin.properties.create') ? 'active' : '' }}">
                <span class="menu-icon">➕</span>
                Add Property
            </a>

            <div class="menu-title" style="margin-top:20px;">
                Website
            </div>

            <a href="{{ route('home') }}"
               target="_blank"
               class="menu-item">
                <span class="menu-icon">🌐</span>
                View Website
            </a>

            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf

                <button type="submit"
                        class="menu-item"
                        style="
                            width:100%;
                            background:none;
                            border:none;
                            cursor:pointer;
                            text-align:left;
                            font-family:inherit;
                        ">
                    <span class="menu-icon">🚪</span>
                    Logout
                </button>
            </form>

        </div>
    </aside>


    <!-- Main Content -->
    <main class="main-content">

        <!-- Topbar -->
        <header class="topbar">

            <div style="display:flex;align-items:center;gap:15px;">

                <span class="mobile-menu"
                      onclick="toggleSidebar()">
                    ☰
                </span>

                <div class="page-heading">

                    <h1>
                        @yield('page_title', 'Dashboard')
                    </h1>

                    <p>
                        Manage your Vamika Properties website
                    </p>

                </div>

            </div>

            <div class="admin-user">

                <div class="admin-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

                <div class="admin-user-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin' }}
                    </strong>

                    <small>
                        Administrator
                    </small>

                </div>

            </div>

        </header>


        <!-- Page Content -->
        <section class="content">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">

                    <strong>Please fix the following errors:</strong>

                    <ul style="margin:8px 0 0 20px;">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            @yield('content')

        </section>

    </main>

</div>


<script>
    function toggleSidebar() {
        document.getElementById('sidebar')
            .classList.toggle('open');
    }
</script>

@stack('scripts')

</body>
</html>

