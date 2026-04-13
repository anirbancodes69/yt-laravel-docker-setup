<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $data = [];

    for ($i = 1; $i <= 10000; $i++) {
        $data[] = [
            'name' => 'Project ' . $i,
            'created_at' => now(),
            'description' => Lorem::sentence(),
            'status' => 'active',
            'updated_at' => now(),
        ];

        // Insert every 10000 records
        if ($i % 10000 == 0) {
            DB::table('projects')->insert($data);
            $data = [];
        }
    }

    // Insert remaining records
    if (!empty($data)) {
        DB::table('projects')->insert($data);
    }
}
}
