<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'property_type',
        'listing_type',
        'price',
        'location',
        'city',
        'state',
        'area',
        'area_unit',
        'bedrooms',
        'bathrooms',
        'description',
        'status',
        'featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area' => 'decimal:2',
        'featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = static::generateUniqueSlug($property->title);
            }
        });

        static::updating(function ($property) {
            if ($property->isDirty('title')) {
                $property->slug = static::generateUniqueSlug(
                    $property->title,
                    $property->id
                );
            }
        });
    }

    public static function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $slug = Str::slug($title);

        $originalSlug = $slug;
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when(
                    $ignoreId,
                    fn ($query) => $query->where('id', '!=', $ignoreId)
                )
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class)
            ->orderBy('sort_order');
    }

    public function getMainImageAttribute(): ?string
    {
        $image = $this->images->first();

        return $image
            ? asset('storage/' . $image->image)
            : null;
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->price >= 10000000) {
            return '₹' . number_format($this->price / 10000000, 2) . ' Cr';
        }

        if ($this->price >= 100000) {
            return '₹' . number_format($this->price / 100000, 2) . ' Lakh';
        }

        return '₹' . number_format($this->price, 0);
    }
}