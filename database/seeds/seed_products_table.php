<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class seed_products_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $dt = Carbon::now();

        foreach (range(1, 25) as $index) {
            DB::table('products')->insert([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'color' => $faker->safeColorName,
                'size' => $faker->numberBetween(52, 178),
                'age' => $faker->numberBetween(0, 13),
                'cat_id' => $faker->numberBetween(1, 30),
                'photo' => $faker->imageUrl($width = 640, $height = 480),
                'active' => $faker->numberBetween(0, 1),
                'created_at' => $dt->addMonths(3)
            ]);
        }
    }
}
