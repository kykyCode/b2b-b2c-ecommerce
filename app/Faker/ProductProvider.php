<?php

declare(strict_types=1);

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductProvider extends Base
{
    protected static $group = [
        '1234-AB-12',
        '2345-CD-34',
        '3456-EF-56',
        '4567-GH-78',
        '5678-IJ-90',
        '6789-KL-AB',
        '7890-MN-CD',
        '8901-OP-EF',
        '9012-QR-GH',
        '0123-ST-IJ',
        '1234-UV-KL',
        '2345-WX-MN',
        '3456-YZ-OP',
        '4567-AB-QR',
        '5678-CD-ST',
        '6789-EF-UV',
        '7890-GH-WX',
        '8901-IJ-YZ',
        '9012-KL-12',
        '0123-MN-34',
        '1234-OP-56',
        '2345-QR-78',
        '3456-ST-90',
        '4567-UV-AB',
        '5678-WX-CD',
        '6789-YZ-EF',
        '7890-AB-GH',
        '8901-CD-IJ',
        '9012-EF-KL',
        '0123-GH-MN',
    ];

    protected static array $productNames = [
        'Laptop', 'Smartphone', 'Tablet', 'Camera', 'Headphones', 'Smartwatch', 'Printer', 'Monitor', 'Keyboard', 'Mouse',
        'Router', 'Speaker', 'Microphone', 'Webcam', 'Charger', 'USB Drive', 'External Hard Drive', 'Gaming Console', 'E-Reader', 'Drone',
        'Fitness Tracker', 'Smart Glasses', 'Projector', 'VR Headset', 'Power Bank', 'Home Security Camera', 'Bluetooth Tracker', 'Smart Thermostat', 'Electric Toothbrush', 'Portable Speaker',
        'Wireless Earbuds', 'Digital Photo Frame', 'Smart Lock', 'Action Camera', 'Smart Light Bulb', 'Robot Vacuum', '3D Printer', 'Electric Scooter', 'Smart Doorbell', 'Portable Charger',
        'Smart Scale', 'Graphic Tablet', 'Noise Cancelling Headphones', 'Smart Display', 'Streaming Device', 'Smart Plug', 'Portable Projector', 'WiFi Extender', 'Smart Oven', 'Coffee Maker',
        'Instant Camera', 'Bluetooth Keyboard', 'Wireless Mouse', 'Smart Water Bottle', 'Electric Kettle', 'Soundbar', 'Electric Shaver', 'Smart Mug', 'Wearable Camera', 'Digital Voice Recorder',
        'Smart Smoke Detector', 'Portable Air Conditioner', 'Smart Air Purifier', 'Digital Alarm Clock', 'Portable Power Station', 'Smart Mirror', 'Smart Ring', 'Wireless Charger', 'Smart Backpack', 'Smart Wallet',
        'Electric Bike', 'Smart Fan', 'Smart Pet Feeder', 'Laser Printer', 'Inkjet Printer', 'Portable SSD', 'Network Attached Storage', 'Gaming Headset', 'Mechanical Keyboard', 'Drawing Tablet',
        'Bluetooth Adapter', 'Portable Monitor', 'Smart Ceiling Fan', 'Smart Light Switch', 'Smart Sprinkler', 'Electric Grill', 'Air Fryer', 'Sous Vide Cooker', 'Wine Cooler', 'Smart Garden',
        'Smart Blender', 'Smart Rice Cooker', 'Smart Slow Cooker', 'Electric Pressure Cooker', 'Smart Garage Door Opener', 'Smart Irrigation Controller', 'Smart Window Shades', 'Smart Refrigerator', 'Smart Washing Machine', 'Smart Dryer'
    ];

    protected static array $productDescriptions = [
        'High quality product with excellent features. This product is designed to meet all your needs. A must-have item for anyone looking for the best in class.',
        'Durable and reliable, this product will last for years. Combines innovative technology with a sleek design. Engineered to perfection, providing the ultimate experience.',
        'Sleek, stylish, and packed with features. Perfect for everyday use or special occasions. Affordable without compromising on quality. An essential gadget for modern living.',
        'Experience the future with this cutting-edge product. Compact and portable, making it easy to use on the go. Crafted from premium materials for a luxurious feel.',
    ];

    public function productName(): string
    {
        return static::randomElement(static::$productNames);
    }

    public function productDescription(): string
    {
        return static::randomElement(static::$productDescriptions);
    }

    public function productMainImage(): string
    {
        $files = File::files(storage_path('app/public/faker-product-images'));
        $images = array_filter($files, function ($file) {
            return in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp']);
        });
        $imageNames = array_map(function ($file) {
            return $file->getFilename();
        }, $images);
        $imageName = static::randomElement($imageNames);
        return Storage::url('public/faker-product-images/' . $imageName);
    }

    public function productGroup(): string
    {
        return static::randomElement(static::$group);
    }
}
