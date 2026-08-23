<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();

        $availableProperties = Property::where(
            'status',
            'available'
        )->count();

        $soldProperties = Property::where(
            'status',
            'sold'
        )->count();

        $rentedProperties = Property::where(
            'status',
            'rented'
        )->count();

        $featuredProperties = Property::where(
            'featured',
            true
        )->count();

        $recentProperties = Property::with('images')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalProperties',
                'availableProperties',
                'soldProperties',
                'rentedProperties',
                'featuredProperties',
                'recentProperties'
            )
        );
    }
}