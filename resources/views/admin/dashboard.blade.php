@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

<style>
    /* =========================================
       VAMIKA PROPERTIES DASHBOARD
    ========================================= */

    .dashboard-container {
        max-width: 1500px;
        margin: 0 auto;
    }

    /* Welcome */
    .welcome-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .welcome-text h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #111827;
    }

    .welcome-text p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .welcome-actions {
        display: flex;
        gap: 10px;
    }

    .dashboard-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .dashboard-btn-primary {
        background: #111827;
        color: #ffffff;
    }

    .dashboard-btn-primary:hover {
        background: #1f2937;
        transform: translateY(-1px);
    }

    .dashboard-btn-light {
        background: #ffffff;
        color: #374151;
        border: 1px solid #d1d5db;
    }

    .dashboard-btn-light:hover {
        background: #f9fafb;
    }


    /* =========================================
       STAT CARDS
    ========================================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 21px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
        transition: all .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 85px;
        height: 85px;
        right: -28px;
        bottom: -28px;
        border-radius: 50%;
        background: rgba(0,0,0,0.025);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .stat-icon-blue {
        background: #eff6ff;
    }

    .stat-icon-green {
        background: #ecfdf5;
    }

    .stat-icon-red {
        background: #fef2f2;
    }

    .stat-icon-orange {
        background: #fff7ed;
    }

    .stat-icon-gold {
        background: #fffbeb;
    }

    .stat-label {
        font-size: 13px;
        color: #6b7280;
        font-weight: 500;
    }

    .stat-value {
        margin-top: 5px;
        font-size: 28px;
        line-height: 1;
        font-weight: 750;
        color: #111827;
    }

    .stat-description {
        margin-top: 12px;
        font-size: 11px;
        color: #9ca3af;
    }


    /* =========================================
       MAIN GRID
    ========================================= */

    .dashboard-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 330px;
        gap: 20px;
        align-items: start;
    }


    /* =========================================
       CARD
    ========================================= */

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    .card-header-custom {
        padding: 20px 22px;
        border-bottom: 1px solid #eef0f3;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .card-header-title h3 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #111827;
    }

    .card-header-title p {
        margin: 5px 0 0;
        color: #9ca3af;
        font-size: 12px;
    }

    .view-all {
        color: #92400e;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
    }

    .view-all:hover {
        text-decoration: underline;
    }


    /* =========================================
       RECENT PROPERTY TABLE
    ========================================= */

    .property-table-wrapper {
        overflow-x: auto;
    }

    .property-table {
        width: 100%;
        border-collapse: collapse;
    }

    .property-table th {
        padding: 13px 20px;
        background: #fafafa;
        border-bottom: 1px solid #eef0f3;
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .property-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #f1f2f4;
        vertical-align: middle;
        font-size: 13px;
        color: #374151;
    }

    .property-table tr:last-child td {
        border-bottom: none;
    }

    .property-table tbody tr {
        transition: background .15s ease;
    }

    .property-table tbody tr:hover {
        background: #fafafa;
    }

    .property-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 220px;
    }

    .property-image {
        width: 55px;
        height: 48px;
        border-radius: 8px;
        overflow: hidden;
        background: #f3f4f6;
        flex-shrink: 0;
    }

    .property-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .property-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 20px;
    }

    .property-name {
        font-weight: 650;
        color: #111827;
        font-size: 13px;
        line-height: 1.4;
    }

    .property-location {
        margin-top: 3px;
        color: #9ca3af;
        font-size: 11px;
    }

    .property-type {
        display: inline-block;
        padding: 5px 9px;
        background: #f3f4f6;
        color: #374151;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .property-price {
        font-weight: 700;
        color: #111827;
        white-space: nowrap;
    }


    /* Status */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-available {
        background: #dcfce7;
        color: #15803d;
    }

    .status-sold {
        background: #fee2e2;
        color: #b91c1c;
    }

    .status-rented {
        background: #fef3c7;
        color: #a16207;
    }


    /* Action */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 7px;
        background: #f3f4f6;
        color: #374151;
        text-decoration: none;
        font-size: 14px;
        transition: all .2s ease;
    }

    .action-btn:hover {
        background: #111827;
        color: #ffffff;
    }


    /* =========================================
       QUICK ACTIONS
    ========================================= */

    .quick-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        padding: 18px;
    }

    .quick-action {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px;
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        color: #374151;
        text-decoration: none;
        transition: all .2s ease;
    }

    .quick-action:hover {
        border-color: #d4af37;
        background: #fffcf2;
        transform: translateY(-1px);
    }

    .quick-action-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        background: #fef3c7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }

    .quick-action-text strong {
        display: block;
        font-size: 11px;
        color: #111827;
    }

    .quick-action-text span {
        display: block;
        margin-top: 2px;
        font-size: 9px;
        color: #9ca3af;
    }


    /* =========================================
       PROPERTY STATUS
    ========================================= */

    .status-content {
        padding: 20px;
    }

    .status-row {
        margin-bottom: 18px;
    }

    .status-row:last-child {
        margin-bottom: 0;
    }

    .status-row-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 7px;
    }

    .status-name {
        color: #374151;
        font-size: 12px;
        font-weight: 600;
    }

    .status-count {
        color: #111827;
        font-size: 12px;
        font-weight: 700;
    }

    .progress-bar {
        height: 7px;
        border-radius: 10px;
        background: #f3f4f6;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        border-radius: 10px;
        transition: width .5s ease;
    }

    .progress-available {
        background: #22c55e;
    }

    .progress-sold {
        background: #ef4444;
    }

    .progress-rented {
        background: #f59e0b;
    }


    /* =========================================
       EMPTY STATE
    ========================================= */

    .empty-state {
        text-align: center;
        padding: 45px 20px;
    }

    .empty-icon {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 13px;
        font-size: 22px;
    }

    .empty-state h4 {
        margin: 0;
        color: #374151;
        font-size: 14px;
    }

    .empty-state p {
        margin: 5px 0 15px;
        color: #9ca3af;
        font-size: 12px;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1200px) {

        .stats-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 800px) {

        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .welcome-section {
            align-items: flex-start;
            flex-direction: column;
        }

    }


    @media (max-width: 550px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .welcome-text h2 {
            font-size: 22px;
        }

        .welcome-actions {
            width: 100%;
        }

        .dashboard-btn {
            flex: 1;
            justify-content: center;
        }

        .quick-actions {
            grid-template-columns: 1fr;
        }

    }

</style>


<div class="dashboard-container">


    {{-- =========================================
         WELCOME HEADER
    ========================================== --}}

    <div class="welcome-section">

        <div class="welcome-text">

            <h2>
                Welcome back, {{ auth()->user()->name ?? 'Admin' }} 👋
            </h2>

            <p>
                Here's what's happening with your property listings today.
            </p>

        </div>


        <div class="welcome-actions">

            <a
                href="{{ route('home') }}"
                target="_blank"
                class="dashboard-btn dashboard-btn-light"
            >
                🌐 View Website
            </a>

            <a
                href="{{ route('admin.properties.create') }}"
                class="dashboard-btn dashboard-btn-primary"
            >
                + Add Property
            </a>

        </div>

    </div>


    {{-- =========================================
         STATISTICS
    ========================================== --}}

    <div class="stats-grid">


        {{-- Total --}}
        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Total Properties
                    </div>

                    <div class="stat-value">
                        {{ $totalProperties }}
                    </div>
                </div>

                <div class="stat-icon stat-icon-blue">
                    🏠
                </div>

            </div>

            <div class="stat-description">
                All properties in your system
            </div>

        </div>


        {{-- Available --}}
        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Available
                    </div>

                    <div class="stat-value">
                        {{ $availableProperties }}
                    </div>
                </div>

                <div class="stat-icon stat-icon-green">
                    ✓
                </div>

            </div>

            <div class="stat-description">
                Properties currently available
            </div>

        </div>


        {{-- Sold --}}
        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Sold
                    </div>

                    <div class="stat-value">
                        {{ $soldProperties }}
                    </div>
                </div>

                <div class="stat-icon stat-icon-red">
                    🏷️
                </div>

            </div>

            <div class="stat-description">
                Properties successfully sold
            </div>

        </div>


        {{-- Rented --}}
        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Rented
                    </div>

                    <div class="stat-value">
                        {{ $rentedProperties }}
                    </div>
                </div>

                <div class="stat-icon stat-icon-orange">
                    🔑
                </div>

            </div>

            <div class="stat-description">
                Properties currently rented
            </div>

        </div>


        {{-- Featured --}}
        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Featured
                    </div>

                    <div class="stat-value">
                        {{ $featuredProperties }}
                    </div>
                </div>

                <div class="stat-icon stat-icon-gold">
                    ⭐
                </div>

            </div>

            <div class="stat-description">
                Featured on homepage
            </div>

        </div>

    </div>


    {{-- =========================================
         MAIN CONTENT
    ========================================== --}}

    <div class="dashboard-grid">


        {{-- =====================================
             RECENT PROPERTIES
        ====================================== --}}

        <div class="dashboard-card">

            <div class="card-header-custom">

                <div class="card-header-title">

                    <h3>
                        Recent Properties
                    </h3>

                    <p>
                        Latest properties added to your website
                    </p>

                </div>

                <a href="{{ route('admin.properties.index') }}" class="view-all" >
                    View All →
                </a>

            </div>


            @if($recentProperties->count())

                <div class="property-table-wrapper">

                    <table class="property-table">

                        <thead>

                            <tr>
                                <th>Property</th>
                                <th>Type</th>
                                <th>Listing</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                        @foreach($recentProperties as $property)

                            <tr>

                                {{-- Property --}}
                                <td>

                                    <div class="property-info">

                                        <div class="property-image">

                                            @php
                                                $propertyImage = $property->images->first();
                                            @endphp


                        

                                            @if($propertyImage)
                                                <img class="property-thumb" src="{{ asset('storage/' . $property->images->first()->image) }}" >
                                            @else
                                                <div class="property-placeholder">
                                                    🏠
                                                </div>

                                            @endif

                                        </div>


                                        <div>

                                            <div class="property-name">
                                                {{ \Illuminate\Support\Str::limit($property->title, 35) }}
                                            </div>

                                            @if($property->location)

                                                <div class="property-location">
                                                    📍 {{ \Illuminate\Support\Str::limit($property->location, 35) }}
                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                </td>


                                {{-- Type --}}
                                <td>

                                    <span class="property-type">
                                        {{ ucfirst($property->property_type) }}
                                    </span>

                                </td>


                                {{-- Listing --}}
                                <td>

                                    <span class="property-type">
                                        {{ $property->listing_type === 'sale' ? 'For Sale' : 'For Rent' }}
                                    </span>

                                </td>


                                {{-- Price --}}
                                <td>

                                    <span class="property-price">

                                        ₹{{ number_format((float) $property->price, 0) }}

                                    </span>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($property->status === 'available')

                                        <span class="status-badge status-available">
                                            <span class="status-dot"></span>
                                            Available
                                        </span>

                                    @elseif($property->status === 'sold')

                                        <span class="status-badge status-sold">
                                            <span class="status-dot"></span>
                                            Sold
                                        </span>

                                    @else

                                        <span class="status-badge status-rented">
                                            <span class="status-dot"></span>
                                            Rented
                                        </span>

                                    @endif

                                </td>


                                {{-- Action --}}
                                <td>

                                    <a
                                        href="{{ route('admin.properties.edit', $property) }}"
                                        class="action-btn"
                                        title="Edit Property"
                                    >
                                        ✏️
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        🏠
                    </div>

                    <h4>
                        No properties yet
                    </h4>

                    <p>
                        Start by adding your first property.
                    </p>

                    <a
                        href="{{ route('admin.properties.create') }}"
                        class="dashboard-btn dashboard-btn-primary"
                    >
                        + Add Property
                    </a>

                </div>

            @endif

        </div>


        {{-- =====================================
             RIGHT SIDEBAR
        ====================================== --}}

        <div>


            {{-- Quick Actions --}}
            <div class="dashboard-card"
                 style="margin-bottom:20px;">

                <div class="card-header-custom">

                    <div class="card-header-title">

                        <h3>
                            Quick Actions
                        </h3>

                        <p>
                            Manage your properties
                        </p>

                    </div>

                </div>


                <div class="quick-actions">

                    <a
                        href="{{ route('admin.properties.create') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            ➕
                        </div>

                        <div class="quick-action-text">

                            <strong>
                                Add Property
                            </strong>

                            <span>
                                Create listing
                            </span>

                        </div>

                    </a>


                    <a
                        href="{{ route('admin.properties.index') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            🏠
                        </div>

                        <div class="quick-action-text">

                            <strong>
                                Properties
                            </strong>

                            <span>
                                Manage listings
                            </span>

                        </div>

                    </a>


                    <a
                        href="{{ route('home') }}"
                        target="_blank"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            🌐
                        </div>

                        <div class="quick-action-text">

                            <strong>
                                Website
                            </strong>

                            <span>
                                Open website
                            </span>

                        </div>

                    </a>


                    <a
                        href="{{ route('admin.properties.index') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            📋
                        </div>

                        <div class="quick-action-text">

                            <strong>
                                All Listings
                            </strong>

                            <span>
                                View properties
                            </span>

                        </div>

                    </a>

                </div>

            </div>


            {{-- Property Status --}}
            <div class="dashboard-card">

                <div class="card-header-custom">

                    <div class="card-header-title">

                        <h3>
                            Property Status
                        </h3>

                        <p>
                            Current listing overview
                        </p>

                    </div>

                </div>


                <div class="status-content">

                    @php
                        $total = max((int) $totalProperties, 1);

                        $availablePercentage =
                            round(($availableProperties / $total) * 100);

                        $soldPercentage =
                            round(($soldProperties / $total) * 100);

                        $rentedPercentage =
                            round(($rentedProperties / $total) * 100);
                    @endphp


                    {{-- Available --}}
                    <div class="status-row">

                        <div class="status-row-top">

                            <span class="status-name">
                                Available
                            </span>

                            <span class="status-count">
                                {{ $availableProperties }}
                            </span>

                        </div>

                        <div class="progress-bar">

                            <div
                                class="progress-fill progress-available"
                                style="width: {{ $availablePercentage }}%;"
                            ></div>

                        </div>

                    </div>


                    {{-- Sold --}}
                    <div class="status-row">

                        <div class="status-row-top">

                            <span class="status-name">
                                Sold
                            </span>

                            <span class="status-count">
                                {{ $soldProperties }}
                            </span>

                        </div>

                        <div class="progress-bar">

                            <div
                                class="progress-fill progress-sold"
                                style="width: {{ $soldPercentage }}%;"
                            ></div>

                        </div>

                    </div>


                    {{-- Rented --}}
                    <div class="status-row">

                        <div class="status-row-top">

                            <span class="status-name">
                                Rented
                            </span>

                            <span class="status-count">
                                {{ $rentedProperties }}
                            </span>

                        </div>

                        <div class="progress-bar">

                            <div
                                class="progress-fill progress-rented"
                                style="width: {{ $rentedPercentage }}%;"
                            ></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection