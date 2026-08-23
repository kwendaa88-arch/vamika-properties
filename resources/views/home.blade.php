<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Vamika Properties | Find Your Perfect Property
    </title>

    <style>

        * {
            box-sizing:border-box;
        }

        body {
            margin:0;
            font-family:
                Arial,
                Helvetica,
                sans-serif;
            color:#1f2937;
            background:#fff;
        }

        a {
            text-decoration:none;
        }

        .container {
            max-width:1200px;
            margin:auto;
            padding:0 20px;
        }

        /* HEADER */

        header {
            height:78px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            border-bottom:1px solid #eee;
            background:white;
        }

        .logo {
            display:flex;
            align-items:center;
            gap:10px;
        }

        .logo-icon {
            width:42px;
            height:42px;
            background:#d4af37;
            color:#111827;
            border-radius:9px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:21px;
            font-weight:bold;
        }

        .logo strong {
            font-size:18px;
            color:#111827;
        }

        nav {
            display:flex;
            gap:30px;
        }

        nav a {
            color:#374151;
            font-size:14px;
        }

        nav a:hover {
            color:#b08d1b;
        }

        /* HERO */

        .hero {
            min-height:550px;
            background:
                linear-gradient(
                    rgba(17,24,39,.72),
                    rgba(17,24,39,.72)
                ),
                linear-gradient(
                    135deg,
                    #374151,
                    #111827
                );
            display:flex;
            align-items:center;
            text-align:center;
            color:white;
        }

        .hero-content {
            max-width:850px;
            margin:auto;
        }

        .hero h1 {
            font-size:52px;
            margin:0 0 20px;
        }

        .hero p {
            font-size:18px;
            color:#e5e7eb;
            margin-bottom:35px;
        }

        .search-box {
            background:white;
            padding:12px;
            border-radius:12px;
            display:flex;
            gap:10px;
            box-shadow:
                0 15px 40px rgba(0,0,0,.2);
        }

        .search-box input,
        .search-box select {
            flex:1;
            border:0;
            outline:0;
            padding:14px;
            font-size:14px;
            background:white;
        }

        .search-button {
            background:#d4af37;
            color:#111827;
            border:0;
            padding:0 25px;
            border-radius:8px;
            font-weight:bold;
            cursor:pointer;
        }

        /* SECTIONS */

        .section {
            padding:80px 0;
        }

        .section-heading {
            text-align:center;
            margin-bottom:40px;
        }

        .section-heading span {
            color:#b08d1b;
            font-size:13px;
            text-transform:uppercase;
            font-weight:bold;
            letter-spacing:2px;
        }

        .section-heading h2 {
            font-size:34px;
            margin:10px 0;
        }

        .section-heading p {
            color:#6b7280;
        }

        /* PROPERTY GRID */

        .property-grid {
            display:grid;
            grid-template-columns:
                repeat(3,1fr);
            gap:25px;
        }

        .property-card {
            border:1px solid #eee;
            border-radius:12px;
            overflow:hidden;
            background:white;
            transition:.2s;
        }

        .property-card:hover {
            transform:translateY(-5px);
            box-shadow:
                0 15px 35px rgba(0,0,0,.08);
        }

        .property-image {
            height:230px;
            background:#f3f4f6;
            position:relative;
        }

        .property-image img {
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .property-content {
            padding:20px;
        }

        .property-content h3 {
            margin:0 0 8px;
            font-size:18px;
        }

        .price {
            color:#b08d1b;
            font-weight:bold;
            font-size:18px;
            margin-bottom:10px;
        }

        .location {
            color:#6b7280;
            font-size:13px;
            margin-bottom:15px;
        }

        .property-meta {
            display:flex;
            gap:15px;
            color:#6b7280;
            font-size:12px;
            padding-top:15px;
            border-top:1px solid #eee;
        }

        .view-button {
            display:block;
            margin-top:18px;
            background:#111827;
            color:white;
            padding:11px;
            text-align:center;
            border-radius:7px;
            font-size:13px;
        }

        /* CTA */

        .cta {
            background:#111827;
            color:white;
            padding:70px 20px;
            text-align:center;
        }

        .cta h2 {
            font-size:34px;
        }

        .cta p {
            color:#d1d5db;
        }

        .cta-buttons {
            margin-top:25px;
            display:flex;
            justify-content:center;
            gap:12px;
        }

        .cta-button {
            padding:13px 25px;
            border-radius:7px;
            font-weight:bold;
        }

        .gold {
            background:#d4af37;
            color:#111827;
        }

        .white {
            background:white;
            color:#111827;
        }

        footer {
            background:#0b1120;
            color:#9ca3af;
            padding:30px;
            text-align:center;
            font-size:13px;
        }

        @media(max-width:800px) {

            nav {
                display:none;
            }

            .hero h1 {
                font-size:36px;
            }

            .search-box {
                flex-direction:column;
            }

            .search-button {
                padding:14px;
            }

            .property-grid {
                grid-template-columns:1fr;
            }

        }

    </style>

</head>

<body>

<header>

    <div class="container"
         style="
            display:flex;
            width:100%;
            align-items:center;
            justify-content:space-between;
         "
    >

        <a
            href="{{ route('home') }}"
            class="logo"
        >

            <div class="logo-icon">
                V
            </div>

            <strong>
                Vamika Properties
            </strong>

        </a>

        <nav>

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="#properties">
                Properties
            </a>

            <a href="#contact">
                Contact
            </a>

        </nav>

    </div>

</header>

<section class="hero">

    <div class="container">

        <div class="hero-content">

            <h1>
                Find Your Perfect Property
            </h1>

            <p>
                Discover beautiful homes, plots,
                shops and commercial properties
                with Vamika Properties.
            </p>

            <form
                class="search-box"
                action="{{ route('properties.index') }}"
                method="GET"
                >

                <input
                    type="text"
                    name="search"
                    placeholder="Search location or property..."
                >

                <select name="property_type">

                    <option value="">
                        Property Type
                    </option>

                    <option value="house">
                        House
                    </option>

                    <option value="flat">
                        Flat
                    </option>

                    <option value="plot">
                        Plot
                    </option>

                    <option value="land">
                        Land
                    </option>

                    <option value="shop">
                        Shop
                    </option>

                    <option value="villa">
                        Villa
                    </option>

                </select>

                <button
                    type="submit"
                    class="search-button"
                >
                    Search
                </button>

            </form>

        </div>

    </div>

</section>

<section class="section" id="properties">

    <div class="container">

        <div class="section-heading">

            <span>
                Featured
            </span>

            <h2>
                Featured Properties
            </h2>

            <p>
                Explore our handpicked property listings.
            </p>

        </div>

        <div class="property-grid">

            @forelse($featuredProperties as $property)

                <div class="property-card">

                    <div class="property-image">

                        @if($property->images->first())

                            <img
                                src="{{ asset(
                                    'storage/' .
                                    $property->images->first()->image
                                ) }}"
                                alt="{{ $property->title }}"
                            >

                        @else

                            <div
                                style="
                                    height:100%;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:50px;
                                "
                            >
                                🏠
                            </div>

                        @endif

                    </div>

                    <div class="property-content">

                        <h3>
                            {{ $property->title }}
                        </h3>

                        <div class="price">
                            {{ $property->formatted_price }}
                        </div>

                        <div class="location">
                            📍 {{ $property->location }}
                        </div>

                        <div class="property-meta">

                            @if($property->area)
                                <span>
                                    📐 {{ $property->area }}
                                    {{ $property->area_unit }}
                                </span>
                            @endif

                            @if($property->bedrooms)
                                <span>
                                    🛏 {{ $property->bedrooms }}
                                    Beds
                                </span>
                            @endif

                            @if($property->bathrooms)
                                <span>
                                    🚿 {{ $property->bathrooms }}
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
                            View Property
                        </a>

                    </div>

                </div>

            @empty

                <p
                    style="
                        grid-column:1/-1;
                        text-align:center;
                        color:#9ca3af;
                    "
                >
                    No featured properties available yet.
                </p>

            @endforelse

        </div>

    </div>

</section>

<section
    class="cta"
    id="contact"
>

    <h2>
        Looking for a Property?
    </h2>

    <p>
        Contact Vamika Properties today.
    </p>

    <div class="cta-buttons">

        <a
            href="tel:{{ env('PROPERTY_PHONE') }}"
            class="cta-button gold"
        >
            📞 Call Now
        </a>

        <a
            href="https://wa.me/{{ env('PROPERTY_WHATSAPP') }}"
            target="_blank"
            class="cta-button white"
        >
            💬 WhatsApp
        </a>

    </div>

</section>

<footer>

    © {{ date('Y') }}
    Vamika Properties.
    All Rights Reserved.

</footer>

</body>

</html>