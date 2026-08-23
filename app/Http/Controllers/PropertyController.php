<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Public homepage.
     */
    public function home()
    {
        $featuredProperties = Property::with('images')
            ->where('status', 'available')
            ->where('featured', true)
            ->latest()
            ->take(6)
            ->get();

        $latestProperties = Property::with('images')
            ->where('status', 'available')
            ->latest()
            ->take(6)
            ->get();

        return view(
            'home',
            compact(
                'featuredProperties',
                'latestProperties'
            )
        );
    }


    /**
     * Public property listing.
     */
    public function index(Request $request)
    {
        $query = Property::with('images')
            ->where('status', 'available')
            ->latest();


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where(
                    'title',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'location',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'city',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'state',
                    'like',
                    "%{$search}%"
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Property Type
        |--------------------------------------------------------------------------
        */

        if ($request->filled('property_type')) {

            $query->where(
                'property_type',
                $request->property_type
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Listing Type
        |--------------------------------------------------------------------------
        */

        if ($request->filled('listing_type')) {

            $query->where(
                'listing_type',
                $request->listing_type
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Properties
        |--------------------------------------------------------------------------
        */

        $properties = $query
            ->paginate(12)
            ->withQueryString();


        return view(
            'properties.index',
            compact('properties')
        );
    }


    /**
     * Public property details.
     */
    public function show(Property $property)
    {
        /*
        |--------------------------------------------------------------------------
        | Only show available properties publicly
        |--------------------------------------------------------------------------
        */

        if ($property->status !== 'available') {
            abort(404);
        }


        $property->load('images');


        return view(
            'properties.show',
            compact('property')
        );
    }
}