<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Define the number of records you want to generate
        $numberOfRecords = 15;
        $currentPadre = 1;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('activities')->insert([
                'alias' =>'activity'.$i,
                'lavorata' => 0,
                'padre' => $currentPadre,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $currentPadre++;
            if ($currentPadre > 6) {
                $currentPadre = 1;
            }
        }
    }
}
