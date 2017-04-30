<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductStoresTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
    }
}
