@extends('admin.layouts.app')

@section('title', 'Edit Property')
@section('page_title', 'Edit Property')

@section('content')

<style>

    .edit-property-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .property-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .property-header h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #111827;
    }

    .property-header p {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border-radius: 8px;
        background: #fff;
        color: #374151;
        border: 1px solid #d1d5db;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .back-btn:hover {
        background: #f9fafb;
    }

    .property-form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    .form-section {
        padding: 28px 30px;
        border-bottom: 1px solid #eef0f3;
    }

    .form-section:last-child {
        border-bottom: none;
    }

    .section-header {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 24px;
    }

    .section-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 10px;
        background: #fef3c7;
        color: #92400e;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .section-title h3 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #111827;
    }

    .section-title p {
        margin: 4px 0 0;
        color: #6b7280;
        font-size: 13px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .three-columns {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .form-group {
        min-width: 0;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
    }

    .required {
        color: #dc2626;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #fff;
        color: #111827;
        font-size: 14px;
        outline: none;
        transition: .2s;
    }

    .form-input,
    .form-select {
        height: 46px;
        padding: 0 13px;
    }

    .form-textarea {
        min-height: 150px;
        padding: 13px;
        resize: vertical;
        line-height: 1.6;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #d4af37;
        box-shadow: 0 0 0 3px rgba(212,175,55,.12);
    }

    .field-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    .input-prefix-wrapper {
        position: relative;
    }

    .input-prefix {
        position: absolute;
        left: 0;
        top: 0;
        width: 42px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid #e5e7eb;
        color: #6b7280;
        font-weight: 600;
    }

    .input-with-prefix {
        padding-left: 55px !important;
    }

    .featured-box {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 16px;
        background: #fafafa;
    }

    .checkbox-label {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        cursor: pointer;
    }

    .checkbox-label input {
        width: 18px;
        height: 18px;
        margin-top: 1px;
        accent-color: #d4af37;
    }

    .checkbox-content strong {
        display: block;
        color: #111827;
        font-size: 14px;
        margin-bottom: 3px;
    }

    .checkbox-content span {
        color: #6b7280;
        font-size: 12px;
    }


    /*
    |--------------------------------------------------------------------------
    | Existing Images
    |--------------------------------------------------------------------------
    */

    .existing-images {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
    }

    .existing-image-card {
        position: relative;
        height: 145px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        background: #f3f4f6;
    }

    .existing-image-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-overlay {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 9px;
        background: linear-gradient(
            transparent,
            rgba(0,0,0,.75)
        );
        display: flex;
        justify-content: flex-end;
    }

    /*
     * IMPORTANT:
     * These are NOT inside the update form.
     */
    .delete-image-form {
        margin: 0;
    }

    .delete-image-btn {
        border: none;
        background: #dc2626;
        color: #fff;
        border-radius: 6px;
        padding: 6px 9px;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
    }

    .delete-image-btn:hover {
        background: #b91c1c;
    }

    .no-images {
        padding: 25px;
        text-align: center;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        color: #9ca3af;
        font-size: 13px;
    }


    /*
    |--------------------------------------------------------------------------
    | Upload
    |--------------------------------------------------------------------------
    */

    .upload-box {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        background: #fafafa;
        padding: 30px 20px;
        text-align: center;
    }

    .upload-icon {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #fef3c7;
        color: #92400e;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 13px;
        font-size: 22px;
    }

    .upload-title {
        font-size: 15px;
        font-weight: 600;
        color: #111827;
    }

    .upload-description {
        margin: 6px 0 16px;
        color: #6b7280;
        font-size: 12px;
    }

    .file-input-wrapper {
        position: relative;
        display: inline-block;
    }

    .file-input-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 7px;
        background: #111827;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .file-input-label:hover {
        background: #1f2937;
    }

    .file-input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .selected-files {
        margin-top: 13px;
        color: #6b7280;
        font-size: 12px;
    }

    .image-preview-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 12px;
        margin-top: 18px;
    }

    .preview-item {
        height: 120px;
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .preview-number {
        position: absolute;
        top: 7px;
        left: 7px;
        background: rgba(0,0,0,.65);
        color: #fff;
        border-radius: 5px;
        padding: 3px 7px;
        font-size: 10px;
    }


    /*
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    */

    .form-footer {
        padding: 22px 30px;
        background: #f9fafb;
        border-top: 1px solid #eef0f3;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-cancel,
    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 12px 23px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-cancel {
        background: #fff;
        border: 1px solid #d1d5db;
        color: #374151;
    }

    .btn-submit {
        border: none;
        background: #111827;
        color: #fff;
    }

    .btn-submit:hover {
        background: #1f2937;
    }


    @media (max-width: 1100px) {

        .three-columns {
            grid-template-columns: repeat(2, 1fr);
        }

        .existing-images,
        .image-preview-container {
            grid-template-columns: repeat(4, 1fr);
        }
    }


    @media (max-width: 700px) {

        .property-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-section {
            padding: 22px 18px;
        }

        .form-grid,
        .three-columns {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .existing-images,
        .image-preview-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-submit {
            width: 100%;
        }
    }

</style>


<div class="edit-property-page">

    {{-- PAGE HEADER --}}
    <div class="property-header">

        <div>

            <h2>
                Edit Property
            </h2>

            <p>
                Update property information, pricing,
                location and photos.
            </p>

        </div>

        <a
            href="{{ route('admin.properties.index') }}"
            class="back-btn"
        >
            ← Back to Properties
        </a>

    </div>


    {{-- =====================================================
         UPDATE FORM
         IMPORTANT: Only ONE form here.
    ====================================================== --}}

    <form
        id="property-update-form"
        action="{{ route('admin.properties.update', $property) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        @method('PUT')


        <div class="property-form-card">


            {{-- BASIC INFORMATION --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        🏠
                    </div>

                    <div class="section-title">

                        <h3>
                            Basic Information
                        </h3>

                        <p>
                            Update the main property information.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    <div class="form-group full-width">

                        <label class="form-label">
                            Property Title
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-input"
                            value="{{ old('title', $property->title) }}"
                            placeholder="Example: Beautiful 3 BHK House"
                            required
                        >

                        @error('title')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Property Type
                            <span class="required">*</span>
                        </label>

                        <select
                            name="property_type"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Property Type
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
                                    {{ old('property_type', $property->property_type) == $value ? 'selected' : '' }}
                                >
                                    {{ $label }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Listing Type
                            <span class="required">*</span>
                        </label>

                        <select
                            name="listing_type"
                            class="form-select"
                            required
                        >

                            <option
                                value="sale"
                                {{ old('listing_type', $property->listing_type) == 'sale' ? 'selected' : '' }}
                            >
                                For Sale
                            </option>

                            <option
                                value="rent"
                                {{ old('listing_type', $property->listing_type) == 'rent' ? 'selected' : '' }}
                            >
                                For Rent
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- PRICE & LOCATION --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        📍
                    </div>

                    <div class="section-title">

                        <h3>
                            Price & Location
                        </h3>

                        <p>
                            Update property price and location details.
                        </p>

                    </div>

                </div>


                <div class="form-grid three-columns">

                    <div class="form-group">

                        <label class="form-label">
                            Price
                            <span class="required">*</span>
                        </label>

                        <div class="input-prefix-wrapper">

                            <span class="input-prefix">
                                ₹
                            </span>

                            <input
                                type="number"
                                name="price"
                                class="form-input input-with-prefix"
                                value="{{ old('price', $property->price) }}"
                                min="0"
                                step="0.01"
                                required
                            >

                        </div>

                    </div>


                    <div
                        class="form-group"
                        style="grid-column: span 2;"
                    >

                        <label class="form-label">
                            Location
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-input"
                            value="{{ old('location', $property->location) }}"
                            placeholder="Main Road, Ramganj Mandi"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            City
                        </label>

                        <input
                            type="text"
                            name="city"
                            class="form-input"
                            value="{{ old('city', $property->city) }}"
                            placeholder="Ramganj Mandi"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            State
                        </label>

                        <input
                            type="text"
                            name="state"
                            class="form-input"
                            value="{{ old('state', $property->state) }}"
                            placeholder="Rajasthan"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Property Area
                        </label>

                        <input
                            type="number"
                            name="area"
                            class="form-input"
                            value="{{ old('area', $property->area) }}"
                            min="0"
                            step="0.01"
                            placeholder="1500"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Area Unit
                        </label>

                        <select
                            name="area_unit"
                            class="form-select"
                        >

                            <option
                                value="sqft"
                                {{ old('area_unit', $property->area_unit) == 'sqft' ? 'selected' : '' }}
                            >
                                Square Feet
                            </option>

                            <option
                                value="sqm"
                                {{ old('area_unit', $property->area_unit) == 'sqm' ? 'selected' : '' }}
                            >
                                Square Meter
                            </option>

                            <option
                                value="sqyard"
                                {{ old('area_unit', $property->area_unit) == 'sqyard' ? 'selected' : '' }}
                            >
                                Square Yard
                            </option>

                            <option
                                value="acre"
                                {{ old('area_unit', $property->area_unit) == 'acre' ? 'selected' : '' }}
                            >
                                Acre
                            </option>

                            <option
                                value="bigha"
                                {{ old('area_unit', $property->area_unit) == 'bigha' ? 'selected' : '' }}
                            >
                                Bigha
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- PROPERTY DETAILS --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        🛏️
                    </div>

                    <div class="section-title">

                        <h3>
                            Property Details
                        </h3>

                        <p>
                            Update rooms, status and description.
                        </p>

                    </div>

                </div>


                <div class="form-grid three-columns">

                    <div class="form-group">

                        <label class="form-label">
                            Bedrooms
                        </label>

                        <input
                            type="number"
                            name="bedrooms"
                            class="form-input"
                            value="{{ old('bedrooms', $property->bedrooms) }}"
                            min="0"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Bathrooms
                        </label>

                        <input
                            type="number"
                            name="bathrooms"
                            class="form-input"
                            value="{{ old('bathrooms', $property->bathrooms) }}"
                            min="0"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Status
                            <span class="required">*</span>
                        </label>

                        <select
                            name="status"
                            class="form-select"
                            required
                        >

                            <option
                                value="available"
                                {{ old('status', $property->status) == 'available' ? 'selected' : '' }}
                            >
                                Available
                            </option>

                            <option
                                value="sold"
                                {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}
                            >
                                Sold
                            </option>

                            <option
                                value="rented"
                                {{ old('status', $property->status) == 'rented' ? 'selected' : '' }}
                            >
                                Rented
                            </option>

                        </select>

                    </div>


                    <div class="form-group full-width">

                        <label class="form-label">
                            Property Description
                        </label>

                        <textarea
                            name="description"
                            class="form-textarea"
                            placeholder="Write complete details about the property..."
                        >{{ old('description', $property->description) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- FEATURED --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        ⭐
                    </div>

                    <div class="section-title">

                        <h3>
                            Homepage Visibility
                        </h3>

                        <p>
                            Control whether this property appears on homepage.
                        </p>

                    </div>

                </div>


                <div class="featured-box">

                    <label class="checkbox-label">

                        <input
                            type="checkbox"
                            name="featured"
                            value="1"
                            {{ old('featured', $property->featured) ? 'checked' : '' }}
                        >

                        <span class="checkbox-content">

                            <strong>
                                Feature this property
                            </strong>

                            <span>
                                Show this property in the featured
                                section on the homepage.
                            </span>

                        </span>

                    </label>

                </div>

            </div>


            {{-- EXISTING IMAGES --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        🖼️
                    </div>

                    <div class="section-title">

                        <h3>
                            Existing Photos
                        </h3>

                        <p>
                            Manage photos already uploaded for this property.
                        </p>

                    </div>

                </div>


                @if($property->images && $property->images->count())

                    <div class="existing-images">

                        @foreach($property->images as $image)

                            <div class="existing-image-card">

                                {{-- IMPORTANT: image column --}}
                                <img
                                    src="{{ asset('storage/' . ltrim($image->image, '/')) }}"
                                    alt="{{ $property->title }}"
                                >

                                <div class="image-overlay">

                                    {{-- 
                                        IMPORTANT:
                                        This form is NOT nested inside
                                        the update form.
                                    --}}

                                    <button
                                        type="submit"
                                        form="delete-image-{{ $image->id }}"
                                        class="delete-image-btn"
                                        onclick="return confirm('Are you sure you want to delete this image?');"
                                    >
                                        🗑 Delete
                                    </button>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="no-images">
                        📷 No photos have been uploaded for this property yet.
                    </div>

                @endif

            </div>


            {{-- ADD NEW PHOTOS --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        📷
                    </div>

                    <div class="section-title">

                        <h3>
                            Add More Photos
                        </h3>

                        <p>
                            Upload additional property photos.
                        </p>

                    </div>

                </div>


                <div class="upload-box">

                    <div class="upload-icon">
                        📷
                    </div>

                    <div class="upload-title">
                        Upload Additional Photos
                    </div>

                    <div class="upload-description">
                        JPG, JPEG, PNG and WEBP images are supported.
                        Maximum 5MB per image.
                    </div>


                    <div class="file-input-wrapper">

                        <label
                            for="property-images"
                            class="file-input-label"
                        >
                            📁 Choose Photos
                        </label>

                        <input
                            type="file"
                            id="property-images"
                            name="images[]"
                            class="file-input"
                            multiple
                            accept="image/jpeg,image/png,image/jpg,image/webp"
                        >

                    </div>


                    <div
                        class="selected-files"
                        id="selected-files"
                    >
                        No new files selected
                    </div>

                </div>


                <div
                    id="image-preview"
                    class="image-preview-container"
                    style="display:none;"
                ></div>

            </div>


            {{-- UPDATE BUTTON --}}
            <div class="form-footer">

                <a
                    href="{{ route('admin.properties.index') }}"
                    class="btn-cancel"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn-submit"
                >
                    ✓ Update Property
                </button>

            </div>


        </div>

    </form>

</div>


{{-- =====================================================
     DELETE IMAGE FORMS

     VERY IMPORTANT:
     These forms are OUTSIDE the update form.
====================================================== --}}

@if($property->images && $property->images->count())

    @foreach($property->images as $image)

        <form
            id="delete-image-{{ $image->id }}"
            action="{{ route('admin.properties.images.destroy', [$property, $image]) }}"
            method="POST"
            class="delete-image-form"
        >

            @csrf

            @method('DELETE')

        </form>

    @endforeach

@endif


<script>

document.addEventListener('DOMContentLoaded', function () {

    const fileInput =
        document.getElementById('property-images');

    const selectedFiles =
        document.getElementById('selected-files');

    const previewContainer =
        document.getElementById('image-preview');


    if (!fileInput) {
        return;
    }


    fileInput.addEventListener('change', function () {

        const files = Array.from(this.files);

        previewContainer.innerHTML = '';


        if (!files.length) {

            selectedFiles.textContent =
                'No new files selected';

            previewContainer.style.display =
                'none';

            return;
        }


        selectedFiles.textContent =
            files.length +
            ' new photo' +
            (files.length > 1 ? 's' : '') +
            ' selected';


        previewContainer.style.display =
            'grid';


        files.forEach(function (file, index) {

            if (!file.type.startsWith('image/')) {
                return;
            }


            const reader =
                new FileReader();


            reader.onload = function (event) {

                const item =
                    document.createElement('div');

                item.className =
                    'preview-item';


                item.innerHTML = `
                    <img
                        src="${event.target.result}"
                        alt="New Property Image"
                    >

                    <span class="preview-number">
                        ${index + 1}
                    </span>
                `;


                previewContainer.appendChild(item);

            };


            reader.readAsDataURL(file);

        });

    });

});

</script>

@endsection