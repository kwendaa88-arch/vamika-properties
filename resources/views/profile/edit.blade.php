@extends('admin.layouts.app')

@section('title', 'Edit Property')
@section('page-title', 'Edit Property')

@section('content')

<div class="card form-card">

    <div class="card-header">

        <div>

            <h2>
                Edit Property
            </h2>

            <p
                style="
                    color:#9ca3af;
                    font-size:13px;
                    margin-top:5px;
                "
            >
                Update property information.
            </p>

        </div>

        <a
            href="{{ route('admin.properties.index') }}"
            class="btn btn-secondary"
        >
            ← Back
        </a>

    </div>

    @if($errors->any())

        <div class="error-box">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form
        action="{{ route('admin.properties.update', $property) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group full">

                <label>
                    Property Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $property->title) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    Property Type *
                </label>

                <select
                    name="property_type"
                    required
                >

                    @foreach([
                        'house',
                        'flat',
                        'plot',
                        'land',
                        'shop',
                        'office',
                        'villa',
                        'other'
                    ] as $type)

                        <option
                            value="{{ $type }}"
                            @selected($property->property_type === $type)
                        >
                            {{ ucfirst($type) }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>
                    Listing Type *
                </label>

                <select name="listing_type">

                    <option
                        value="sale"
                        @selected($property->listing_type === 'sale')
                    >
                        For Sale
                    </option>

                    <option
                        value="rent"
                        @selected($property->listing_type === 'rent')
                    >
                        For Rent
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>
                    Price *
                </label>

                <input
                    type="number"
                    name="price"
                    value="{{ old('price', $property->price) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    Location *
                </label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location', $property->location) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    City
                </label>

                <input
                    type="text"
                    name="city"
                    value="{{ old('city', $property->city) }}"
                >

            </div>

            <div class="form-group">

                <label>
                    State
                </label>

                <input
                    type="text"
                    name="state"
                    value="{{ old('state', $property->state) }}"
                >

            </div>

            <div class="form-group">

                <label>
                    Area
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="area"
                    value="{{ old('area', $property->area) }}"
                >

            </div>

            <div class="form-group">

                <label>
                    Area Unit
                </label>

                <select name="area_unit">

                    @foreach([
                        'sqft' => 'Square Feet',
                        'sqm' => 'Square Meter',
                        'bigha' => 'Bigha',
                        'acre' => 'Acre'
                    ] as $value => $label)

                        <option
                            value="{{ $value }}"
                            @selected($property->area_unit === $value)
                        >
                            {{ $label }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>
                    Bedrooms
                </label>

                <input
                    type="number"
                    name="bedrooms"
                    value="{{ old('bedrooms', $property->bedrooms) }}"
                >

            </div>

            <div class="form-group">

                <label>
                    Bathrooms
                </label>

                <input
                    type="number"
                    name="bathrooms"
                    value="{{ old('bathrooms', $property->bathrooms) }}"
                >

            </div>

            <div class="form-group full">

                <label>
                    Description
                </label>

                <textarea name="description">{{ old('description', $property->description) }}</textarea>

            </div>

            <div class="form-group">

                <label>
                    Status
                </label>

                <select name="status">

                    <option
                        value="available"
                        @selected($property->status === 'available')
                    >
                        Available
                    </option>

                    <option
                        value="sold"
                        @selected($property->status === 'sold')
                    >
                        Sold
                    </option>

                    <option
                        value="rented"
                        @selected($property->status === 'rented')
                    >
                        Rented
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>
                    Featured
                </label>

                <label
                    style="
                        display:flex;
                        gap:8px;
                        align-items:center;
                        font-weight:normal;
                    "
                >

                    <input
                        type="checkbox"
                        name="featured"
                        value="1"
                        style="width:auto;"
                        @checked($property->featured)
                    >

                    Show on homepage

                </label>

            </div>

            <div class="form-group full">

                <label>
                    Existing Photos
                </label>

                <div
                    style="
                        display:flex;
                        gap:15px;
                        flex-wrap:wrap;
                    "
                >

                    @forelse($property->images as $image)

                        <div
                            style="
                                width:150px;
                                position:relative;
                            "
                        >

                            <img
                                src="{{ asset('storage/' . $image->image) }}"
                                style="
                                    width:150px;
                                    height:110px;
                                    object-fit:cover;
                                    border-radius:8px;
                                "
                            >

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.properties.images.destroy',
                                    [$property, $image->id]
                                ) }}"
                                onsubmit="return confirm('Delete this image?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                    style="
                                        margin-top:5px;
                                        width:100%;
                                        justify-content:center;
                                    "
                                >
                                    Delete Image
                                </button>

                            </form>

                        </div>

                    @empty

                        <p style="color:#9ca3af;">
                            No images uploaded.
                        </p>

                    @endforelse

                </div>

            </div>

            <div class="form-group full">

                <label>
                    Add More Photos
                </label>

                <input
                    type="file"
                    name="images[]"
                    multiple
                    accept=".jpg,.jpeg,.png,.webp"
                >

            </div>

        </div>

        <div
            style="
                margin-top:30px;
                padding-top:20px;
                border-top:1px solid #eee;
            "
        >

            <button
                type="submit"
                class="btn btn-gold"
            >
                Update Property
            </button>

        </div>

    </form>

</div>

@endsection