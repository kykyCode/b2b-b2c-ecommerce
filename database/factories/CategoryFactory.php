<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use App\Faker\CategoryProvider;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new CategoryProvider($faker));

        $nameEn = $faker->categoryName();
        $nameFr = $faker->categoryName();

        return [
            'name' => [
                'en' => $nameEn,
                'fr' => $nameFr,
            ],
            'description' => [
                'en' => $faker->categoryDescription(),
                'fr' => $faker->categoryDescription(),
            ],
            'slug' => $this->generateUniqueSlug($faker->categorySlug()),
            'parent_id' => null,
            'department_id' => Department::inRandomOrder()->first()->id,
        ];
    }

    private function generateUniqueSlug($baseSlug)
    {
        $randomString = $this->generateRandomString(5);
        return $baseSlug . '-' . $randomString;
    }

    private function generateRandomString($length = 5)
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $length)), 0, $length);
    }
}
