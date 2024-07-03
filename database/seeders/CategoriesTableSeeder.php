<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Para empezar']);
        Category::create(['name' => 'Once']);
        Category::create(['name' => 'Desayuno']);
        Category::create(['name' => 'Almuerzo']);
        Category::create(['name' => 'Bebestibles']);
    }
}
