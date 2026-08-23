<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->enum('property_type', [
                'house',
                'flat',
                'plot',
                'land',
                'shop',
                'office',
                'villa',
                'other'
            ]);

            $table->enum('listing_type', [
                'sale',
                'rent'
            ]);

            $table->decimal('price', 15, 2);

            $table->string('location');
            $table->string('city')->nullable();
            $table->string('state')->nullable();

            $table->decimal('area', 12, 2)->nullable();
            $table->string('area_unit')->default('sqft');

            $table->unsignedInteger('bedrooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();

            $table->text('description')->nullable();

            $table->enum('status', [
                'available',
                'sold',
                'rented'
            ])->default('available');

            $table->boolean('featured')->default(false);

            $table->timestamps();

            $table->index('property_type');
            $table->index('listing_type');
            $table->index('status');
            $table->index('city');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};