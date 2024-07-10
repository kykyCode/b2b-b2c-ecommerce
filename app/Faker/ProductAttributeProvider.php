<?php

declare(strict_types=1);

namespace App\Faker;

use Faker\Provider\Base;

class ProductAttributeProvider extends Base
{
    protected static array $countries = [
        'USA', 'Poland', 'France', 'Germany', 'China',
        'Japan', 'South Korea', 'Canada', 'Italy', 'Spain',
        'Brazil', 'Australia', 'India', 'Russia', 'Mexico',
        'Netherlands', 'Sweden', 'Norway', 'Switzerland', 'Turkey'
    ];

    protected static array $colors = [
        'Red', 'Blue', 'Green', 'Yellow', 'Black',
        'White', 'Gray', 'Orange', 'Purple', 'Pink',
        'Brown', 'Cyan', 'Magenta', 'Turquoise', 'Olive',
        'Silver', 'Gold', 'Beige', 'Maroon', 'Lavender',
    ];

    protected static array $materials = [
        'Plastic', 'Metal', 'Wood', 'Glass', 'Ceramic',
        'Leather', 'Fabric', 'Rubber', 'Silicone', 'Paper',
        'Bamboo', 'Concrete', 'Stone', 'Carbon Fiber',
        'Cork', 'Wool', 'Nylon', 'Acrylic', 'Foam', 'Vinyl'
    ];

    public function country(): string
    {
        return static::randomElement(static::$countries);
    }

    public function color(): string
    {
        return static::randomElement(static::$colors);
    }

    public function weight(): string
    {
        return rand(100, 5000) . 'g';
    }

    public function size(): string
    {
        return rand(10, 100) . 'cm';
    }

    public function material(): string
    {
        return static::randomElement(static::$materials);
    }
}
