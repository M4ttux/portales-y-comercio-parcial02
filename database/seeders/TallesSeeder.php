<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TallesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('talles')->insert([
            [
                'talle' => 'XS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'talle' => 'S',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'talle' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'talle' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'talle' => 'XL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'talle' => 'XXL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'talle' => 'XXXL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
