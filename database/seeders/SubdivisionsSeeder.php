<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subdivisions;
class SubdivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $subdivisions = [
            [
                'name' => 'Bankura Sadar subdivision',
                'district_id' => 13,
                'district_code' => 'BANK',
                'state_id' => 4853,
                'state_code' => 'WB',
                'country_id' => 101,
                'country_code' => 'IN',
                'latitude' => '23.23540000',
                'longitude' => '87.07390000',
                'created_at' => now(),
                'updated_at' => now(),
                'flag' => 1,
                'wikiDataId' => 'Q1368',
            ],
            [
                'name' => 'Bishnupur subdivision',
                'district_id' => 13,
                'district_code' => 'BANK',
                'state_id' => 4853,
                'state_code' => 'WB',
                'country_id' => 101,
                'country_code' => 'IN',
                'latitude' => '23.23540000',
                'longitude' => '87.07390000',
                'created_at' => now(),
                'updated_at' => now(),
                'flag' => 1,
                'wikiDataId' => 'Q1368',
            ],
            [
                'name' => 'Khatra subdivision',
                'district_id' => 13,
                'district_code' => 'BANK',
                'state_id' => 4853,
                'state_code' => 'WB',
                'country_id' => 101,
                'country_code' => 'IN',
                'latitude' => '23.23540000',
                'longitude' => '87.07390000',
                'created_at' => now(),
                'updated_at' => now(),
                'flag' => 1,
                'wikiDataId' => 'Q1368',
            ],
        ];

        // Insert into the database
        \DB::table('subdivisions')->insert($subdivisions);
    }
}
