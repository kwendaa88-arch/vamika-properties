<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('images')
            ->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $properties = $query->paginate(10)
            ->withQueryString();

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'property_type' => 'required|in:house,flat,plot,land,shop,office,villa,other',
            'listing_type' => 'required|in:sale,rent',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'area' => 'nullable|numeric|min:0',
            'area_unit' => 'required|string|max:20',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:available,sold,rented',
            'featured' => 'nullable|boolean',
            'images' => 'nullable|array|max:20',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['featured'] = $request->boolean('featured');

        $property = Property::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store(
                    'properties/' . $property->id,
                    'public'
                );

                $property->images()->create([
                    'image' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property added successfully.');
    }

    public function edit(Property $property)
    {
        $property->load('images');

        return view(
            'admin.properties.edit',
            compact('property')
        );
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'property_type' => 'required|in:house,flat,plot,land,shop,office,villa,other',
            'listing_type' => 'required|in:sale,rent',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'area' => 'nullable|numeric|min:0',
            'area_unit' => 'required|string|max:20',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:available,sold,rented',
            'featured' => 'nullable|boolean',
            'images' => 'nullable|array|max:20',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['featured'] = $request->boolean('featured');

        $property->update($validated);

        if ($request->hasFile('images')) {
            $lastSortOrder = $property->images()->max('sort_order') ?? -1;

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store(
                    'properties/' . $property->id,
                    'public'
                );

                $property->images()->create([
                    'image' => $path,
                    'sort_order' => $lastSortOrder + $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $property->delete();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    public function destroyImage(
        Property $property,
        $image
    ) {
        $propertyImage = $property->images()
            ->where('id', $image)
            ->firstOrFail();

        Storage::disk('public')
            ->delete($propertyImage->image);

        $propertyImage->delete();

        return back()->with(
            'success',
            'Image deleted successfully.'
        );
    }
}