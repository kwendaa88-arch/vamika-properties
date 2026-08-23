<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $property->title }} | Vamika Properties
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


        /* HEADER */

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

            background: #d4af37;

            color: #111827;

            border-radius: 8px;

            font-weight: 800;
            font-size: 20px;
        }

        nav {
            display: flex;
            gap: 25px;
        }

        nav a {
            color: #d1d5db;

            font-size: 14px;
        }

        nav a:hover {
            color: #d4af37;
        }


        /* PAGE */

        .page {
            max-width: 1200px;

            margin: auto;

            padding: 40px 20px 80px;
        }


        /* BACK */

        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 25px;

            color: #6b7280;

            font-size: 14px;

            font-weight: 600;
        }

        .back-link:hover {
            color: #111827;
        }


        /* MAIN GRID */

        .property-layout {

            display: grid;

            grid-template-columns:
                1.5fr
                1fr;

            gap: 30px;

            align-items: start;
        }


        /* GALLERY */

        .gallery {

            background: #fff;

            border-radius: 14px;

            overflow: hidden;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 5px 20px rgba(0,0,0,.06);
        }

        .main-image {

            width: 100%;

            height: 500px;

            background: #f3f4f6;

            position: relative;

            overflow: hidden;
        }

        .main-image img {

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

            font-size: 80px;

            color: #9ca3af;
        }

        .featured-badge {

            position: absolute;

            top: 18px;
            left: 18px;

            background: #d4af37;

            color: #111827;

            padding: 8px 13px;

            border-radius: 6px;

            font-size: 12px;

            font-weight: 700;
        }

        .listing-badge {

            position: absolute;

            top: 18px;
            right: 18px;

            background:
                rgba(17,24,39,.88);

            color: #fff;

            padding: 8px 13px;

            border-radius: 6px;

            font-size: 12px;

            font-weight: 700;
        }


        /* THUMBNAILS */

        .thumbnails {

            display: flex;

            gap: 10px;

            padding: 12px;

            overflow-x: auto;
        }

        .thumbnail {

            width: 90px;
            height: 70px;

            flex: 0 0 90px;

            border-radius: 7px;

            overflow: hidden;

            cursor: pointer;

            border: 2px solid transparent;
        }

        .thumbnail:hover {

            border-color: #d4af37;
        }

        .thumbnail img {

            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        /* DETAILS CARD */

        .details-card {

            background: #fff;

            border-radius: 14px;

            padding: 30px;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 5px 20px rgba(0,0,0,.06);
        }

        .property-type {

            color: #a07c13;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: 1px;

            font-weight: 700;

            margin-bottom: 10px;
        }

        .property-title {

            margin: 0;

            font-size: 31px;

            line-height: 1.25;

            color: #111827;
        }

        .location {

            margin-top: 12px;

            color: #6b7280;

            font-size: 14px;

            line-height: 1.5;
        }

        .price {

            margin-top: 22px;

            font-size: 30px;

            font-weight: 800;

            color: #111827;
        }

        .listing-label {

            margin-top: 5px;

            color: #a07c13;

            font-size: 13px;

            font-weight: 600;
        }


        /* FEATURES */

        .features {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 25px;

            padding-top: 25px;

            border-top:
                1px solid #e5e7eb;
        }

        .feature {

            padding: 14px;

            background: #f9fafb;

            border-radius: 8px;
        }

        .feature-label {

            color: #6b7280;

            font-size: 11px;

            text-transform: uppercase;

            font-weight: 700;
        }

        .feature-value {

            margin-top: 5px;

            color: #111827;

            font-size: 15px;

            font-weight: 700;
        }


        /* CONTACT */

        .contact-buttons {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 10px;

            margin-top: 25px;
        }

        .contact-button {

            height: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 7px;

            font-size: 13px;

            font-weight: 700;
        }

        .call-button {

            background: #111827;

            color: #fff;
        }

        .call-button:hover {

            background: #d4af37;

            color: #111827;
        }

        .whatsapp-button {

            background: #16a34a;

            color: #fff;
        }

        .whatsapp-button:hover {

            background: #15803d;
        }


        /* DESCRIPTION */

        .description-card {

            margin-top: 30px;

            background: #fff;

            border-radius: 14px;

            padding: 30px;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 5px 20px rgba(0,0,0,.05);
        }

        .section-title {

            margin: 0 0 18px;

            font-size: 22px;

            color: #111827;
        }

        .description {

            color: #6b7280;

            line-height: 1.8;

            font-size: 15px;

            white-space: pre-line;
        }


        /* PROPERTY INFO */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;

            margin-top: 20px;
        }

        .info-item {

            padding: 18px;

            border-radius: 8px;

            background: #f9fafb;
        }


        /* FOOTER */

        footer {

            background: #0b1120;

            color: #9ca3af;

            padding: 30px;

            text-align: center;

            font-size: 13px;
        }


        /* RESPONSIVE */

        @media(max-width: 900px) {

            .property-layout {

                grid-template-columns: 1fr;
            }

            .main-image {

                height: 400px;
            }

        }


        @media(max-width: 600px) {

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

                padding: 25px 15px 60px;
            }

            .main-image {

                height: 300px;
            }

            .property-title {

                font-size: 25px;
            }

            .details-card,
            .description-card {

                padding: 20px;
            }

            .info-grid {

                grid-template-columns: 1fr 1fr;
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


        <a
            href="{{ route('properties.index') }}"
            class="back-link"
        >
            ← Back to Properties
        </a>


        <div class="property-layout">


            {{-- GALLERY --}}

            <div class="gallery">


                <div class="main-image">

                    @if($property->images->first())

                        <img
                            id="mainPropertyImage"
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

                        <span class="featured-badge">
                            ⭐ Featured Property
                        </span>

                    @endif


                    <span class="listing-badge">

                        {{ $property->listing_type === 'rent'
                            ? 'For Rent'
                            : 'For Sale'
                        }}

                    </span>

                </div>


                {{-- THUMBNAILS --}}

                @if($property->images->count() > 1)

                    <div class="thumbnails">

                        @foreach($property->images as $image)

                            <div
                                class="thumbnail"
                                onclick="changeImage(
                                    '{{ asset(
                                        'storage/' .
                                        ltrim(
                                            $image->image,
                                            '/'
                                        )
                                    ) }}'
                                )"
                            >

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        ltrim(
                                            $image->image,
                                            '/'
                                        )
                                    ) }}"
                                    alt="{{ $property->title }}"
                                >

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>


            {{-- DETAILS --}}

            <div class="details-card">


                <div class="property-type">

                    {{ ucfirst($property->property_type) }}

                </div>


                <h1 class="property-title">

                    {{ $property->title }}

                </h1>


                <div class="location">

                    📍

                    {{ $property->location }}

                    @if($property->city)
                        , {{ $property->city }}
                    @endif

                    @if($property->state)
                        , {{ $property->state }}
                    @endif

                </div>


                <div class="price">

                    ₹{{ number_format($property->price) }}

                </div>


                <div class="listing-label">

                    {{ $property->listing_type === 'rent'
                        ? 'Available for Rent'
                        : 'Available for Sale'
                    }}

                </div>


                {{-- FEATURES --}}

                <div class="features">


                    @if($property->area)

                        <div class="feature">

                            <div class="feature-label">
                                Area
                            </div>

                            <div class="feature-value">

                                {{ number_format($property->area) }}

                                {{ $property->area_unit }}

                            </div>

                        </div>

                    @endif


                    @if($property->bedrooms !== null)

                        <div class="feature">

                            <div class="feature-label">
                                Bedrooms
                            </div>

                            <div class="feature-value">

                                {{ $property->bedrooms }}

                            </div>

                        </div>

                    @endif


                    @if($property->bathrooms !== null)

                        <div class="feature">

                            <div class="feature-label">
                                Bathrooms
                            </div>

                            <div class="feature-value">

                                {{ $property->bathrooms }}

                            </div>

                        </div>

                    @endif


                    <div class="feature">

                        <div class="feature-label">
                            Status
                        </div>

                        <div class="feature-value">

                            {{ ucfirst($property->status) }}

                        </div>

                    </div>


                </div>


                {{-- CONTACT --}}

                <div class="contact-buttons">

                    <a
                        href="tel:+917878991122"
                        class="contact-button call-button"
                    >
                        📞 Call Now
                    </a>


                    <a
                        href="https://wa.me/917878991122"
                        target="_blank"
                        class="contact-button whatsapp-button"
                    >
                        💬 WhatsApp
                    </a>

                </div>

            </div>

        </div>


        {{-- DESCRIPTION --}}

        <div class="description-card">

            <h2 class="section-title">
                Property Description
            </h2>


            @if($property->description)

                <div class="description">

                    {{ $property->description }}

                </div>

            @else

                <div class="description">

                    No description available for this property.

                </div>

            @endif


            <div class="info-grid">


                <div class="info-item">

                    <div class="feature-label">
                        Property Type
                    </div>

                    <div class="feature-value">

                        {{ ucfirst($property->property_type) }}

                    </div>

                </div>


                <div class="info-item">

                    <div class="feature-label">
                        Listing Type
                    </div>

                    <div class="feature-value">

                        {{ ucfirst($property->listing_type) }}

                    </div>

                </div>


                <div class="info-item">

                    <div class="feature-label">
                        Location
                    </div>

                    <div class="feature-value">

                        {{ $property->location }}

                    </div>

                </div>


            </div>

        </div>


    </div>

</main>


<footer>

    © {{ date('Y') }}

    Vamika Properties.

    All Rights Reserved.

</footer>


<script>

function changeImage(imageUrl)
{
    const image =
        document.getElementById(
            'mainPropertyImage'
        );

    if (image) {

        image.src = imageUrl;

    }
}

</script>


</body>

</html>