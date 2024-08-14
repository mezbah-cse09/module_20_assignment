<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::truncate();

        // for($i=0; $i<10; $i++){
        //     Contact::create([
        //         'name' => fake()->name,
        //         'email' => fake()->unique()->email,
        //         'phone' => fake()->optional()->phoneNumber,
        //         'address' => fake()->optional()->address
        //     ]);
        // }

        for($i=0; $i<50; $i++){
            Contact::create([
                'name' => fake()->name,
                'email' => fake()->unique()->email,
                'phone' => fake()->optional()->numerify('88017########'),
                'address' => fake()->optional()->address()
            ]);
        }


    }
}
