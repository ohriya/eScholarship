<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 500; $i++) {
            $your_photo = $faker->image('public/images/your_photos', 100, 100, null, false);
            $citizenship_back = $faker->image('public/images/citizenship_backs', 640, 480, null, false);
            $citizenship_front = $faker->image('public/images/citizenship_fronts', 640, 480, null, false);
            $marksheet_photo = $faker->image('public/images/marksheet_photos', 640, 480, null, false);
            DB::table('profiles')->insert([
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone_number' => $faker->unique()->numerify('##########'),
                'perma_address' => $faker->address,
                'dob' => $faker->date('Y-m-d', '-18 years'),
                'high_school_gpa' => $faker->randomFloat(2, 2, 4),
                'high_school_name' => $faker->company,
                'caste' => $faker->randomElement(['Brahmin', 'Chhetri', 'Dalit', 'Aadibasi', 'Janajati']),
                'parent_id' => $faker->regexify('GOVT-Serv-[0-9]{6}'),
                'user_id' => $i + 1,
                'your_photo' => 'images/your_photos/' . $your_photo,
                'citizenship_front' => 'images/citizenship_fronts/' . $citizenship_front,
                'citizenship_back' => 'images/citizenship_backs/' . $citizenship_back,
                'marksheet_photo' => 'images/marksheet_photos/' . $marksheet_photo,

                // 'email' => $faker->unique()->safeEmail,
                // 'password' => Hash::make('password'),
            ]);
        }
    }
}
