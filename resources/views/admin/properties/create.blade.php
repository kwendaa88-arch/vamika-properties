@extends('admin.layouts.app')

@section('title', 'Add Property')
@section('page_title', 'Add New Property')

@section('content')

<style>
    /* =========================================
       ADD PROPERTY PAGE
    ========================================= */

    .property-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Header */
    .property-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .property-header-left h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #111827;
    }

    .property-header-left p {
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
        background: #ffffff;
        color: #374151;
        border: 1px solid #d1d5db;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .back-btn:hover {
        background: #f9fafb;
        border-color: #9ca3af;
    }

    /* Main Card */
    .property-form-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    /* Section */
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

    /* Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-grid.three-columns {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .form-group {
        margin: 0;
    }

    .form-group.full-width {
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
        margin-left: 2px;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        height: 46px;
        padding: 0 13px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #ffffff;
        color: #111827;
        font-size: 14px;
        outline: none;
        transition: all .2s ease;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #9ca3af;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #d4af37;
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.12);
    }

    .form-select {
        cursor: pointer;
    }

    .form-textarea {
        height: 150px;
        padding: 13px;
        resize: vertical;
        line-height: 1.6;
    }

    .field-help {
        margin-top: 6px;
        color: #9ca3af;
        font-size: 12px;
    }

    /* Input with prefix */
    .input-prefix-wrapper {
        position: relative;
    }

    .input-prefix {
        position: absolute;
        left: 0;
        top: 0;
        height: 46px;
        width: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        font-size: 14px;
        font-weight: 600;
        border-right: 1px solid #e5e7eb;
        pointer-events: none;
    }

    .input-with-prefix {
        padding-left: 55px;
    }

    /* Checkbox */
    .featured-box {
        margin-top: 4px;
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
        cursor: pointer;
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
        line-height: 1.5;
    }

    /* Upload */
    .upload-box {
        position: relative;
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        background: #fafafa;
        padding: 35px 25px;
        text-align: center;
        transition: all .2s ease;
    }

    .upload-box:hover {
        border-color: #d4af37;
        background: #fffcf2;
    }

    .upload-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #fef3c7;
        color: #92400e;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
        font-size: 24px;
    }

    .upload-title {
        font-size: 15px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 6px;
    }

    .upload-description {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 18px;
    }

    .file-input-wrapper {
        display: inline-flex;
        position: relative;
    }

    .file-input-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        background: #111827;
        color: #ffffff;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background .2s ease;
    }

    .file-input-label:hover {
        background: #1f2937;
    }

    .file-input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .selected-files {
        margin-top: 15px;
        color: #6b7280;
        font-size: 12px;
    }

    /* Image Preview */
    .image-preview-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 12px;
        margin-top: 20px;
    }

    .preview-item {
        position: relative;
        height: 120px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        background: #f3f4f6;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .preview-number {
        position: absolute;
        left: 7px;
        top: 7px;
        padding: 3px 7px;
        border-radius: 5px;
        background: rgba(0,0,0,.65);
        color: #fff;
        font-size: 10px;
    }

    /* Form Footer */
    .form-footer {
        padding: 22px 30px;
        background: #f9fafb;
        border-top: 1px solid #eef0f3;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 22px;
        border-radius: 8px;
        background: #ffffff;
        border: 1px solid #d1d5db;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-cancel:hover {
        background: #f3f4f6;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        background: #111827;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s ease;
    }

    .btn-submit:hover {
        background: #1f2937;
        transform: translateY(-1px);
    }

    /* Validation */
    .field-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    .has-error .form-input,
    .has-error .form-select,
    .has-error .form-textarea {
        border-color: #dc2626;
    }

    /* Mobile */
    @media (max-width: 1000px) {
        .form-grid.three-columns {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .image-preview-container {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (max-width: 700px) {
        .property-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .form-section {
            padding: 22px 18px;
        }

        .form-grid,
        .form-grid.three-columns {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .image-preview-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-footer {
            padding: 18px;
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-submit {
            width: 100%;
        }
    }

    @media (max-width: 450px) {
        .property-header-left h2 {
            font-size: 22px;
        }

        .upload-box {
            padding: 25px 15px;
        }
    }
</style>


<div class="property-page">

    {{-- PAGE HEADER --}}
    <div class="property-header">

        <div class="property-header-left">
            <h2>Add New Property</h2>

            <p>
                Add property details, pricing, location and photos.
            </p>
        </div>

        <a href="{{ route('admin.properties.index') }}"
           class="back-btn">
            ← Back to Properties
        </a>

    </div>


    {{-- FORM --}}
    <form action="{{ route('admin.properties.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="property-form-card">


            {{-- =====================================
                 BASIC INFORMATION
            ====================================== --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        🏠
                    </div>

                    <div class="section-title">
                        <h3>Basic Information</h3>

                        <p>
                            Enter the main details of the property.
                        </p>
                    </div>

                </div>


                <div class="form-grid">

                    {{-- Property Title --}}
                    <div class="form-group full-width
                        {{ $errors->has('title') ? 'has-error' : '' }}">

                        <label class="form-label">
                            Property Title
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-input"
                            value="{{ old('title') }}"
                            placeholder="Example: Beautiful 3 BHK House"
                            required
                        >

                        @error('title')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Property Type --}}
                    <div class="form-group
                        {{ $errors->has('property_type') ? 'has-error' : '' }}">

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

                            <option value="house"
                                {{ old('property_type') == 'house' ? 'selected' : '' }}>
                                House
                            </option>

                            <option value="apartment"
                                {{ old('property_type') == 'apartment' ? 'selected' : '' }}>
                                Apartment
                            </option>

                            <option value="villa"
                                {{ old('property_type') == 'villa' ? 'selected' : '' }}>
                                Villa
                            </option>

                            <option value="plot"
                                {{ old('property_type') == 'plot' ? 'selected' : '' }}>
                                Plot
                            </option>

                            <option value="commercial"
                                {{ old('property_type') == 'commercial' ? 'selected' : '' }}>
                                Commercial
                            </option>

                            <option value="office"
                                {{ old('property_type') == 'office' ? 'selected' : '' }}>
                                Office
                            </option>

                            <option value="shop"
                                {{ old('property_type') == 'shop' ? 'selected' : '' }}>
                                Shop
                            </option>

                        </select>

                        @error('property_type')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Listing Type --}}
                    <div class="form-group
                        {{ $errors->has('listing_type') ? 'has-error' : '' }}">

                        <label class="form-label">
                            Listing Type
                            <span class="required">*</span>
                        </label>

                        <select
                            name="listing_type"
                            class="form-select"
                            required
                        >

                            <option value="sale"
                                {{ old('listing_type', 'sale') == 'sale' ? 'selected' : '' }}>
                                For Sale
                            </option>

                            <option value="rent"
                                {{ old('listing_type') == 'rent' ? 'selected' : '' }}>
                                For Rent
                            </option>

                        </select>

                        @error('listing_type')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- =====================================
                 PRICE & LOCATION
            ====================================== --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        📍
                    </div>

                    <div class="section-title">

                        <h3>Price & Location</h3>

                        <p>
                            Add pricing and property location information.
                        </p>

                    </div>

                </div>


                <div class="form-grid three-columns">

                    {{-- Price --}}
                    <div class="form-group
                        {{ $errors->has('price') ? 'has-error' : '' }}">

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
                                value="{{ old('price') }}"
                                placeholder="45,00,000"
                                min="0"
                                step="0.01"
                                required
                            >

                        </div>

                        @error('price')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Location --}}
                    <div class="form-group"
                         style="grid-column: span 2;">

                        <label class="form-label">
                            Location
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-input"
                            value="{{ old('location') }}"
                            placeholder="Example: Main Road, Ramganj Mandi"
                            required
                        >

                        @error('location')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- City --}}
                    <div class="form-group">

                        <label class="form-label">
                            City
                        </label>

                        <input
                            type="text"
                            name="city"
                            class="form-input"
                            value="{{ old('city') }}"
                            placeholder="Ramganj Mandi"
                        >

                    </div>


                    {{-- State --}}
                    <div class="form-group">

                        <label class="form-label">
                            State
                        </label>

                        <input
                            type="text"
                            name="state"
                            class="form-input"
                            value="{{ old('state') }}"
                            placeholder="Rajasthan"
                        >

                    </div>


                    {{-- Area --}}
                    <div class="form-group">

                        <label class="form-label">
                            Property Area
                        </label>

                        <input
                            type="number"
                            name="area"
                            class="form-input"
                            value="{{ old('area') }}"
                            placeholder="1500"
                            min="0"
                            step="0.01"
                        >

                    </div>


                    {{-- Area Unit --}}
                    <div class="form-group">

                        <label class="form-label">
                            Area Unit
                        </label>

                        <select
                            name="area_unit"
                            class="form-select"
                        >

                            <option value="sqft"
                                {{ old('area_unit', 'sqft') == 'sqft' ? 'selected' : '' }}>
                                Square Feet
                            </option>

                            <option value="sqm"
                                {{ old('area_unit') == 'sqm' ? 'selected' : '' }}>
                                Square Meter
                            </option>

                            <option value="sqyard"
                                {{ old('area_unit') == 'sqyard' ? 'selected' : '' }}>
                                Square Yard
                            </option>

                            <option value="acre"
                                {{ old('area_unit') == 'acre' ? 'selected' : '' }}>
                                Acre
                            </option>

                            <option value="bigha"
                                {{ old('area_unit') == 'bigha' ? 'selected' : '' }}>
                                Bigha
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- =====================================
                 PROPERTY DETAILS
            ====================================== --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        🛏️
                    </div>

                    <div class="section-title">

                        <h3>Property Details</h3>

                        <p>
                            Add rooms and detailed property information.
                        </p>

                    </div>

                </div>


                <div class="form-grid three-columns">

                    {{-- Bedrooms --}}
                    <div class="form-group">

                        <label class="form-label">
                            Bedrooms
                        </label>

                        <input
                            type="number"
                            name="bedrooms"
                            class="form-input"
                            value="{{ old('bedrooms') }}"
                            placeholder="3"
                            min="0"
                        >

                    </div>


                    {{-- Bathrooms --}}
                    <div class="form-group">

                        <label class="form-label">
                            Bathrooms
                        </label>

                        <input
                            type="number"
                            name="bathrooms"
                            class="form-input"
                            value="{{ old('bathrooms') }}"
                            placeholder="2"
                            min="0"
                        >

                    </div>


                    {{-- Status --}}
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

                            <option value="available"
                                {{ old('status', 'available') == 'available' ? 'selected' : '' }}>
                                Available
                            </option>

                            <option value="sold"
                                {{ old('status') == 'sold' ? 'selected' : '' }}>
                                Sold
                            </option>

                            <option value="rented"
                                {{ old('status') == 'rented' ? 'selected' : '' }}>
                                Rented
                            </option>

                        </select>

                    </div>


                    {{-- Description --}}
                    <div class="form-group full-width">

                        <label class="form-label">
                            Property Description
                        </label>

                        <textarea
                            name="description"
                            class="form-textarea"
                            placeholder="Write complete details about the property..."
                        >{{ old('description') }}</textarea>

                        <div class="field-help">
                            Add important information such as construction,
                            amenities, nearby locations, parking, facing,
                            floor details, etc.
                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================
                 FEATURED PROPERTY
            ====================================== --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        ⭐
                    </div>

                    <div class="section-title">

                        <h3>Homepage Visibility</h3>

                        <p>
                            Choose whether this property should appear on the homepage.
                        </p>

                    </div>

                </div>


                <div class="featured-box">

                    <label class="checkbox-label">

                        <input
                            type="checkbox"
                            name="featured"
                            value="1"
                            {{ old('featured') ? 'checked' : '' }}
                        >

                        <span class="checkbox-content">

                            <strong>
                                Feature this property
                            </strong>

                            <span>
                                This property will be displayed in the
                                featured properties section on the homepage.
                            </span>

                        </span>

                    </label>

                </div>

            </div>


            {{-- =====================================
                 PROPERTY PHOTOS
            ====================================== --}}
            <div class="form-section">

                <div class="section-header">

                    <div class="section-icon">
                        📷
                    </div>

                    <div class="section-title">

                        <h3>Property Photos</h3>

                        <p>
                            Upload high-quality photos of the property.
                        </p>

                    </div>

                </div>


                <div class="upload-box">

                    <div class="upload-icon">
                        📷
                    </div>

                    <div class="upload-title">
                        Upload Property Photos
                    </div>

                    <div class="upload-description">
                        Select multiple images. JPG, JPEG and PNG are supported.
                    </div>


                    <div class="file-input-wrapper">

                        <label for="property-images"
                               class="file-input-label">

                            📁 Choose Photos

                        </label>

                        <input
                            type="file"
                            id="property-images"
                            name="images[]"
                            class="file-input"
                            multiple
                            accept="image/jpeg,image/png,image/jpg"
                        >

                    </div>


                    <div class="selected-files"
                         id="selected-files">

                        No files selected

                    </div>

                </div>


                {{-- Image Preview --}}
                <div
                    class="image-preview-container"
                    id="image-preview"
                    style="display:none;">
                </div>

            </div>


            {{-- =====================================
                 FORM FOOTER
            ====================================== --}}
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
                    <span>✓</span>
                    Save Property
                </button>

            </div>


        </div>

    </form>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const fileInput = document.getElementById('property-images');
    const selectedFiles = document.getElementById('selected-files');
    const previewContainer = document.getElementById('image-preview');

    if (!fileInput) {
        return;
    }

    fileInput.addEventListener('change', function () {

        const files = Array.from(this.files);

        previewContainer.innerHTML = '';

        if (files.length === 0) {

            selectedFiles.textContent = 'No files selected';

            previewContainer.style.display = 'none';

            return;
        }

        selectedFiles.textContent =
            files.length + ' photo' + (files.length > 1 ? 's' : '') + ' selected';

        previewContainer.style.display = 'grid';

        files.forEach(function (file, index) {

            if (!file.type.startsWith('image/')) {
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {

                const item = document.createElement('div');

                item.className = 'preview-item';

                item.innerHTML = `
                    <img src="${event.target.result}" alt="Property Image">
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