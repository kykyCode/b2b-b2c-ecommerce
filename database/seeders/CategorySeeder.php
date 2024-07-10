<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Department;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Department::factory()->count(10)->create();
        Category::factory()->count(30)->create();
    }
}
