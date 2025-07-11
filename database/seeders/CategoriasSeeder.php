<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'categoria' => 'Camiseta de Futbol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria' => 'Campera de Futbol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria' => 'Buzo de Futbol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria' => 'Remera de Futbol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria' => 'Short de Futbol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria' => 'Calza',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
