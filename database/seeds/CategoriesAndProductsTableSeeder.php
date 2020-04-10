<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('categories')->insert([
                'name' => $faker->name,
                'company_id' => 1
	        ]);
    }

    foreach (range(1,40) as $index){
        DB::table('products')->insert([
            'name' => $faker->name,
            'brand_id' => 1,
            'category_id'=> rand(1, 10),
            'company_id' => 1,
            'picture' => '/product/1586381861.jpg',
            'qty' => 40,
            'purchased_date' => $faker->dateTime,
            'expiry_date' => $faker->dateTIme,
            'amount' => rand(1000, 10000)
        ]);
    }
    }


}
