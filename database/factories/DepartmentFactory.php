<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Support\Str;
use App\Faker\CategoryProvider;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new CategoryProvider($faker));

        $nameEn = $faker->categoryName();
        $nameFr = $faker->categoryName();
        $slug = Str::slug($nameEn);
        $randomString = Str::random(8);
        $key = $slug . '-' . $randomString;

        return [
            'name' => [
                'en' => $nameEn,
                'fr' => $nameFr,
            ],
            'description' => [
                'en' => $faker->categoryDescription(),
                'fr' => $faker->categoryDescription(),
            ],
            'key' => $key,
            'main_image' => $this->departmentMainImage($faker), // Pass the $faker instance here
        ];
    }

    /**
     * Generate a random image URL for the department's main image.
     */
    protected function departmentMainImage($faker): string
    {
        $files = File::files(storage_path('app/public/faker-department-images'));
        $images = array_filter($files, function ($file) {
            return in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp']);
        });
        $imageNames = array_map(function ($file) {
            return $file->getFilename();
        }, $images);

        $imageName = $faker->randomElement($imageNames);

        return Storage::url('public/faker-department-images/' . $imageName);
    }
}
