@extends('admin.layouts.app')

@section('title', 'Properties')
@section('page-title', 'Properties')

@section('content')

<div class="card">

    <div class="card-header">

        <div>

            <h2>
                All Properties
            </h2>

            <p
                style="
                    margin:5px 0 0;
                    color:#9ca3af;
                    font-size:13px;
                "
            >
                Manage your property listings
            </p>

        </div>

        <a
            href="{{ route('admin.properties.create') }}"
            class="btn btn-gold"
        >
            + Add Property
        </a>

    </div>

    <form
        method="GET"
        style="
            display:flex;
            gap:10px;
            margin-bottom:25px;
            flex-wrap:wrap;
        "
    >

        <input
            type="text"
            name="search"
            placeholder="Search property..."
            value="{{ request('search') }}"
            style="max-width:300px;"
        >

        <select
            name="status"
            style="max-width:180px;"
        >

            <option value="">
                All Status
            </option>

            <option
                value="available"
                @selected(request('status') === 'available')
            >
                Available
            </option>

            <option
                value="sold"
                @selected(request('status') === 'sold')
            >
                Sold
            </option>

            <option
                value="rented"
                @selected(request('status') === 'rented')
            >
                Rented
            </option>

        </select>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Search
        </button>

        <a
            href="{{ route('admin.properties.index') }}"
            class="btn btn-secondary"
        >
            Reset
        </a>

    </form>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>Photo</th>
                    <th>Property</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Listing Type</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($properties as $property)

                <tr>

                    <td>

                        @if($property->images->first())

                            <img
                                class="property-thumb"
                                src="{{ asset('storage/' . $property->images->first()->image) }}"
                            >

                        @else

                            <div
                                class="property-thumb"
                                style="
                                    background:#f3f4f6;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                "
                            >
                                🏠
                            </div>

                        @endif

                    </td>

                    <td>

                        <strong>
                            {{ $property->title }}
                        </strong>

                        @if($property->featured)

                            <span
                                class="badge badge-warning"
                                style="margin-left:5px;"
                            >
                                Featured
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ ucfirst($property->property_type) }}
                    </td>

                    <td>
                        {{ $property->formatted_price }}
                    </td>

                    <td>
                        {{ $property->location }}
                    </td>
                    <td>
                        @if($property->listing_type === 'rent')
                          <span class="badge badge-success">
                                Rent
                            </span>
                        @else
                        <span class="badge badge-danger">
                                Sell
                            </span>
                        @endif    
                    </td>
                    <td>

                        @if($property->status === 'available')

                            <span class="badge badge-success">
                                Available
                            </span>

                        @elseif($property->status === 'sold')

                            <span class="badge badge-danger">
                                Sold
                            </span>

                        @else

                            <span class="badge badge-warning">
                                Rented
                            </span>

                        @endif

                    </td>

                    <td>

                        <div
                            style="
                                display:flex;
                                gap:6px;
                            "
                        >

                            <a
                                href="{{ route('admin.properties.edit', $property) }}"
                                class="btn btn-secondary"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="{{ route('admin.properties.destroy', $property) }}"
                                onsubmit="return confirm('Are you sure you want to delete this property?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="7"
                        style="
                            text-align:center;
                            padding:50px;
                        "
                    >

                        <div style="font-size:40px;">
                            🏠
                        </div>

                        <h3>
                            No Properties Found
                        </h3>

                        <p
                            style="
                                color:#9ca3af;
                            "
                        >
                            Start by adding your first property.
                        </p>

                        <a
                            href="{{ route('admin.properties.create') }}"
                            class="btn btn-gold"
                        >
                            + Add Property
                        </a>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div style="margin-top:25px;">

        {{ $properties->links() }}

    </div>

</div>

@endsection