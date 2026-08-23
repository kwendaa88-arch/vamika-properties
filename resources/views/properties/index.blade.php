<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Properties | Vamika Properties
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family:
                Arial,
                Helvetica,
                sans-serif;
            background: #f8fafc;
            color: #111827;
        }

        a {
            text-decoration: none;
        }


        /*
        |--------------------------------------------------------------------------
        | HEADER
        |--------------------------------------------------------------------------
        */

        header {
            height: 76px;
            background: #111827;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .header-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #fff;
            font-size: 20px;
            font-weight: 700;
        }

        .logo-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: #d4af37;
            color: #111827;

            font-weight: 800;
            font-size: 20px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        nav a {
            color: #d1d5db;
            font-size: 14px;
        }

        nav a:hover {
            color: #d4af37;
        }


        /*
        |--------------------------------------------------------------------------
        | PAGE
        |--------------------------------------------------------------------------
        */

        .page {
            max-width: 1200px;
            margin: auto;
            padding: 55px 20px 80px;
        }


        /*
        |--------------------------------------------------------------------------
        | TITLE
        |--------------------------------------------------------------------------
        */

        .page-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .page-heading span {
            color: #d4af37;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .page-heading h1 {
            margin: 8px 0;
            font-size: 38px;
            color: #111827;
        }

        .page-heading p {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        .search-card {
            background: #fff;

            padding: 22px;

            border-radius: 12px;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, .06);

            margin-bottom: 40px;
        }

        .search-form {
            display: grid;

            grid-template-columns:
                2fr
                1fr
                1fr
                auto
                auto;

            gap: 12px;
        }

        .search-input,
        .search-select {

            width: 100%;
            height: 46px;

            padding: 0 13px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            background: #fff;

            font-size: 14px;

            outline: none;
        }

        .search-input:focus,
        .search-select:focus {

            border-color: #d4af37;

            box-shadow:
                0 0 0 3px
                rgba(212, 175, 55, .12);
        }

        .search-button {

            height: 46px;

            padding: 0 22px;

            border: none;

            border-radius: 7px;

            background: #111827;

            color: #fff;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;
        }

        .search-button:hover {
            background: #d4af37;
            color: #111827;
        }

        .reset-button {

            height: 46px;

            padding: 0 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 7px;

            background: #f3f4f6;

            color: #374151;

            font-size: 14px;

            font-weight: 600;
        }


        /*
        |--------------------------------------------------------------------------
        | RESULT HEADER
        |--------------------------------------------------------------------------
        */

        .result-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }

        .result-header h2 {

            margin: 0;

            font-size: 22px;

            color: #111827;
        }

        .result-count {

            color: #6b7280;

            font-size: 14px;
        }


        /*
        |--------------------------------------------------------------------------
        | PROPERTY GRID
        |--------------------------------------------------------------------------
        */

        .property-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }


        /*
        |--------------------------------------------------------------------------
        | PROPERTY CARD
        |--------------------------------------------------------------------------
        */

        .property-card {

            background: #fff;

            border-radius: 12px;

            overflow: hidden;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, .06);

            transition:
                transform .2s,
                box-shadow .2s;
        }

        .property-card:hover {

            transform: translateY(-4px);

            box-shadow:
                0 12px 30px rgba(0, 0, 0, .12);
        }


        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        .property-image {

            height: 230px;

            background: #f3f4f6;

            position: relative;

            overflow: hidden;
        }

        .property-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;
        }

        .image-placeholder {

            width: 100%;

            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 55px;

            color: #9ca3af;
        }

        .featured {

            position: absolute;

            top: 12px;

            left: 12px;

            background: #d4af37;

            color: #111827;

            padding: 6px 10px;

            border-radius: 5px;

            font-size: 11px;

            font-weight: 700;
        }

        .listing-type {

            position: absolute;

            top: 12px;

            right: 12px;

            background:
                rgba(17, 24, 39, .85);

            color: #fff;

            padding: 6px 10px;

            border-radius: 5px;

            font-size: 11px;

            font-weight: 600;
        }


        /*
        |--------------------------------------------------------------------------
        | CONTENT
        |--------------------------------------------------------------------------
        */

        .property-content {

            padding: 20px;
        }

        .property-type {

            color: #a07c13;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .7px;

            margin-bottom: 7px;
        }

        .property-title {

            margin: 0;

            font-size: 19px;

            line-height: 1.35;

            color: #111827;
        }

        .property-location {

            margin-top: 9px;

            color: #6b7280;

            font-size: 13px;

            line-height: 1.5;
        }

        .property-price {

            margin-top: 15px;

            font-size: 21px;

            font-weight: 800;

            color: #111827;
        }


        /*
        |--------------------------------------------------------------------------
        | META
        |--------------------------------------------------------------------------
        */

        .property-meta {

            display: flex;

            gap: 15px;

            flex-wrap: wrap;

            margin-top: 15px;

            padding: 14px 0;

            border-top:
                1px solid #eef0f3;

            border-bottom:
                1px solid #eef0f3;

            color: #6b7280;

            font-size: 12px;
        }


        /*
        |--------------------------------------------------------------------------
        | VIEW BUTTON
        |--------------------------------------------------------------------------
        */

        .view-button {

            width: 100%;

            height: 43px;

            margin-top: 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 7px;

            background: #111827;

            color: #fff;

            font-size: 13px;

            font-weight: 700;
        }

        .view-button:hover {

            background: #d4af37;

            color: #111827;
        }


        /*
        |--------------------------------------------------------------------------
        | EMPTY
        |--------------------------------------------------------------------------
        */

        .empty {

            background: #fff;

            padding: 70px 20px;

            border-radius: 12px;

            text-align: center;

            border: 1px solid #e5e7eb;
        }

        .empty-icon {
            font-size: 50px;
        }

        .empty h3 {

            margin: 15px 0 5px;

            color: #111827;
        }

        .empty p {

            margin: 0;

            color: #6b7280;
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        .pagination {

            display: flex;

            justify-content: center;

            margin-top: 40px;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        footer {

            background: #0b1120;

            color: #9ca3af;

            padding: 30px;

            text-align: center;

            font-size: 13px;
        }


        /*
        |--------------------------------------------------------------------------
        | RESPONSIVE
        |--------------------------------------------------------------------------
        */

        @media(max-width: 1000px) {

            .search-form {

                grid-template-columns:
                    1fr 1fr;
            }

            .property-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }
        }


        @media(max-width: 650px) {

            header {

                height: auto;

                padding: 16px 0;
            }

            .header-container {

                flex-direction: column;

                gap: 15px;
            }

            nav {

                gap: 15px;
            }

            .page {

                padding: 35px 15px;
            }

            .page-heading h1 {

                font-size: 30px;
            }

            .search-form {

                grid-template-columns: 1fr;
            }

            .property-grid {

                grid-template-columns: 1fr;
            }

            .result-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 6px;
            }

        }

    </style>

</head>


<body>


<header>

    <div class="header-container">

        <a
            href="{{ route('home') }}"
            class="logo"
        >

            <span class="logo-icon">
                V
            </span>

            <span>
                Vamika Properties
            </span>

        </a>


        <nav>

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('properties.index') }}">
                Properties
            </a>

            <a href="{{ route('home') }}#contact">
                Contact
            </a>

        </nav>

    </div>

</header>


<main>

    <div class="page">


        {{-- PAGE HEADING --}}

        <div class="page-heading">

            <span>
                Vamika Properties
            </span>

            <h1>
                Find Your Perfect Property
            </h1>

            <p>
                Browse our latest properties available for sale and rent.
            </p>

        </div>


        {{-- SEARCH --}}

        <div class="search-card">

            <form
                action="{{ route('properties.index') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search location, city or property..."
                    value="{{ request('search') }}"
                >


                <select
                    name="property_type"
                    class="search-select"
                >

                    <option value="">
                        All Property Types
                    </option>

                    @foreach([
                        'house' => 'House',
                        'flat' => 'Flat',
                        'plot' => 'Plot',
                        'land' => 'Land',
                        'shop' => 'Shop',
                        'office' => 'Office',
                        'villa' => 'Villa',
                        'other' => 'Other'
                    ] as $value => $label)

                        <option
                            value="{{ $value }}"
                            {{ request('property_type') == $value ? 'selected' : '' }}
                        >
                            {{ $label }}
                        </option>

                    @endforeach

                </select>


                <select
                    name="listing_type"
                    class="search-select"
                >

                    <option value="">
                        Sale / Rent
                    </option>

                    <option
                        value="sale"
                        {{ request('listing_type') == 'sale' ? 'selected' : '' }}
                    >
                        For Sale
                    </option>

                    <option
                        value="rent"
                        {{ request('listing_type') == 'rent' ? 'selected' : '' }}
                    >
                        For Rent
                    </option>

                </select>


                <button
                    type="submit"
                    class="search-button"
                >
                    🔍 Search
                </button>


                <a
                    href="{{ route('properties.index') }}"
                    class="reset-button"
                >
                    Reset
                </a>

            </form>

        </div>


        {{-- RESULTS --}}

        <div class="result-header">

            <h2>
                Properties
            </h2>

            <div class="result-count">

                {{ $properties->total() }}

                {{ $properties->total() == 1
                    ? 'property'
                    : 'properties'
                }}

                found

            </div>

        </div>


        @if($properties->count())


            <div class="property-grid">


                @foreach($properties as $property)


                    <div class="property-card">


                        {{-- IMAGE --}}

                        <div class="property-image">

                            @if($property->images->first())

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        ltrim(
                                            $property->images->first()->image,
                                            '/'
                                        )
                                    ) }}"
                                    alt="{{ $property->title }}"
                                >

                            @else

                                <div class="image-placeholder">
                                    🏠
                                </div>

                            @endif


                            @if($property->featured)

                                <span class="featured">
                                    ⭐ Featured
                                </span>

                            @endif


                            <span class="listing-type">

                                {{ $property->listing_type === 'rent'
                                    ? 'For Rent'
                                    : 'For Sale'
                                }}

                            </span>

                        </div>


                        {{-- CONTENT --}}

                        <div class="property-content">


                            <div class="property-type">

                                {{ ucfirst($property->property_type) }}

                            </div>


                            <h3 class="property-title">

                                {{ $property->title }}

                            </h3>


                            <div class="property-location">

                                📍

                                {{ $property->location }}

                                @if($property->city)
                                    , {{ $property->city }}
                                @endif

                                @if($property->state)
                                    , {{ $property->state }}
                                @endif

                            </div>


                            <div class="property-price">

                                ₹{{ number_format($property->price) }}

                            </div>


                            <div class="property-meta">

                                @if($property->area)

                                    <span>
                                        📐
                                        {{ number_format($property->area) }}
                                        {{ $property->area_unit }}
                                    </span>

                                @endif


                                @if($property->bedrooms !== null)

                                    <span>
                                        🛏
                                        {{ $property->bedrooms }}
                                        Beds
                                    </span>

                                @endif


                                @if($property->bathrooms !== null)

                                    <span>
                                        🚿
                                        {{ $property->bathrooms }}
                                        Baths
                                    </span>

                                @endif

                            </div>


                            <a
                                href="{{ route(
                                    'properties.show',
                                    $property
                                ) }}"
                                class="view-button"
                            >
                                View Property →
                            </a>

                        </div>

                    </div>


                @endforeach


            </div>


            {{-- PAGINATION --}}

            @if($properties->hasPages())

                <div class="pagination">

                    {{ $properties->withQueryString()->links() }}

                </div>

            @endif


        @else


            <div class="empty">

                <div class="empty-icon">
                    🏠
                </div>

                <h3>
                    No Properties Found
                </h3>

                <p>
                    Try changing your search or filter.
                </p>

            </div>


        @endif


    </div>

</main>


<footer>

    © {{ date('Y') }}
    Vamika Properties.
    All Rights Reserved.

</footer>


</body>

</html>