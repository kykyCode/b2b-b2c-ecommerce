<?php

declare(strict_types=1);

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryProvider extends Base
{
    protected static array $categoryNames = [
        'Electronics', 'Computers & Accessories', 'Home Appliances', 'Mobile Phones', 'Tablets', 'Cameras & Photography',
        'Audio & Headphones', 'Wearable Technology', 'Smart Home', 'Gaming', 'Office Electronics', 'Car Electronics',
        'Health & Personal Care', 'Kitchen Appliances', 'Lighting & Ceiling Fans', 'Batteries & Chargers', 'Networking Products'
    ];

    protected static array $categoryDescriptions = [
        'Discover a wide range of electronics with cutting-edge technology including TVs, smartphones, tablets, home appliances and more.',
        'Explore the latest in computer technology, including high-performance laptops, desktops, printers, and accessories.',
        'Upgrade your home with our wide range of appliances designed to make your life easier and more enjoyable.',
        'Stay connected with our latest mobile phones and accessories, featuring the newest technology and sleek designs.',
        'Find the perfect tablet for work, play, and everything in between, with a variety of sizes and features to choose from.',
        'Capture life’s moments with our selection of cameras and photography equipment, from DSLRs to action cameras.',
        'Experience exceptional audio quality with our range of headphones, speakers, and audio accessories.',
        'Stay on the cutting edge of technology with our wearable tech, including smartwatches, fitness trackers, and more.',
        'Transform your home into a smart home with our range of smart devices, including lighting, security, and home automation products.',
        'Dive into the world of gaming with our consoles, games, accessories, and more, perfect for gamers of all levels.',
        'Equip your office with the latest electronics, from printers and scanners to shredders and projectors.',
        'Enhance your driving experience with our car electronics, including GPS systems, dash cams, and more.',
        'Take care of your health and personal care needs with our selection of products, from electric toothbrushes to massagers.',
        'Discover kitchen appliances that make cooking and food preparation easier and more enjoyable.',
        'Illuminate your space with our range of lighting and ceiling fans, perfect for any room in your home.',
        'Keep your devices powered up with our range of batteries and chargers, suitable for a variety of electronics.',
        'Stay connected with our networking products, including routers, modems, and range extenders.'
    ];

    public function categoryName(): string
    {
        return static::randomElement(static::$categoryNames);
    }

    public function categoryDescription(): string
    {
        return static::randomElement(static::$categoryDescriptions);
    }

    public function categorySlug(): string
    {
        $name = $this->categoryName();
        return Str::slug($name);
    }

    public function categoryMainImage(): string
    {
        $files = File::files(storage_path('app/public/faker-category-images'));
        $images = array_filter($files, function ($file) {
            return in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp']);
        });
        $imageNames = array_map(function ($file) {
            return $file->getFilename();
        }, $images);
        $imageName = static::randomElement($imageNames);
        return Storage::url('public/faker-category-images/' . $imageName);
    }
}
