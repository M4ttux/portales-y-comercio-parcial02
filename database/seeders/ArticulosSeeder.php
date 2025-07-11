<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ArticulosSeeder extends Seeder
{
    public function run(): void
    {
        $articulos = [
            [
                'nombre' => 'Camiseta Titular River Plate 2023',
                'descripcion' => 'AUTHENTIC RIVER PLATE 23/24',
                'precio' => 55900.00,
                'imagen' => 'camiseta1.PNG',
                'imagen_hover' => 'camiseta1-atras.png',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 1,
                'cantidad' => 10,
                'talles' => [3, 4, 5], // M, L, XL
            ],
            [
                'nombre' => 'Camiseta Suplente River Plate 2023',
                'descripcion' => 'AUTHENTIC RIVER PLATE 23/24',
                'precio' => 55900.00,
                'imagen' => 'camiseta2.PNG',
                'imagen_hover' => 'camiseta2-atras.png',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 1,
                'cantidad' => 8,
                'talles' => [2, 3, 4], // S, M, L
            ],
            [
                'nombre' => 'Camiseta Arquero River Plate 2023',
                'descripcion' => 'AUTHENTIC RIVER PLATE 23/24',
                'precio' => 72000.00,
                'imagen' => 'camiseta3.PNG',
                'imagen_hover' => 'camiseta3-atras.png',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 1,
                'cantidad' => 5,
                'talles' => [5, 6], // XL, XXL
            ],
            [
                'nombre' => 'Campera Oficial River Plate 2023',
                'descripcion' => 'AUTHENTIC RIVER PLATE 23/24',
                'precio' => 85000.00,
                'imagen' => 'camiseta4.PNG',
                'imagen_hover' => 'camiseta4-atras.png',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 2,
                'cantidad' => 6,
                'talles' => [4, 5, 6], // L, XL, XXL
            ],
            [
                'nombre' => 'Buzo Oficial River Plate 2023',
                'descripcion' => 'AUTHENTIC RIVER PLATE 23/24',
                'precio' => 65000.00,
                'imagen' => 'camiseta5.PNG',
                'imagen_hover' => 'camiseta5-atras.png',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 3,
                'cantidad' => 4,
                'talles' => [3, 4, 5], // M, L, XL
            ],
            [
                'nombre' => 'Remera Oficial River Plate 2023',
                'descripcion' => 'AUTHENTIC RIVER PLATE 23/24',
                'precio' => 15000.00,
                'imagen' => 'camiseta6.PNG',
                'imagen_hover' => 'camiseta6-atras.png',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 4,
                'cantidad' => 7,
                'talles' => [1, 2, 3], // XS, S, M
            ],
            [
                'nombre' => 'Camiseta Titular River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 124000.00,
                'imagen' => 'camiseta7.jpg',
                'imagen_hover' => 'camiseta7-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 1,
                'cantidad' => 12,
                'talles' => [3, 4], // M, L
            ],
            [
                'nombre' => 'Camiseta Suplente River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 100000.00,
                'imagen' => 'camiseta8.jpg',
                'imagen_hover' => 'camiseta8-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 1,
                'cantidad' => 10,
                'talles' => [3, 5], // M, XL
            ],
            [
                'nombre' => 'Camiseta Arquero River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 80000.00,
                'imagen' => 'camiseta9.jpg',
                'imagen_hover' => 'camiseta9-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 1,
                'cantidad' => 6,
                'talles' => [4, 5], // L, XL
            ],
            [
                'nombre' => 'Campera Oficial River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 76000.00,
                'imagen' => 'camiseta10.jpg',
                'imagen_hover' => 'camiseta10-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 2,
                'cantidad' => 9,
                'talles' => [5, 6, 7], // XL, XXL, XXXL
            ],
            [
                'nombre' => 'Buzo Oficial River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 40000.00,
                'imagen' => 'camiseta11.jpg',
                'imagen_hover' => 'camiseta11-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 3,
                'cantidad' => 5,
                'talles' => [2, 3, 4], // S, M, L
            ],
            [
                'nombre' => 'Remera Oficial River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 25000.00,
                'imagen' => 'camiseta12.jpg',
                'imagen_hover' => 'camiseta12-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 4,
                'cantidad' => 8,
                'talles' => [1, 2, 3, 4], // XS - L
            ],
            [
                'nombre' => 'Short Suplente River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 21000.00,
                'imagen' => 'camiseta13.jpg',
                'imagen_hover' => 'camiseta13-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 5,
                'cantidad' => 9,
                'talles' => [2, 3], // S, M
            ],
            [
                'nombre' => 'Short Jugador River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 21000.00,
                'imagen' => 'camiseta14.jpg',
                'imagen_hover' => 'camiseta14-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 5,
                'cantidad' => 9,
                'talles' => [3, 4], // M, L
            ],
            [
                'nombre' => 'Short Arquero River Plate 2024',
                'descripcion' => 'AUTHENTIC RIVER PLATE 24/25',
                'precio' => 20000.00,
                'imagen' => 'camiseta15.jpg',
                'imagen_hover' => 'camiseta15-atras.jpg',
                'fecha_creacion' => '2024-01-01',
                'categoria_id' => 5,
                'cantidad' => 4,
                'talles' => [4, 5], // L, XL
            ],
            [
                'nombre' => 'Calza Running 2024',
                'descripcion' => 'Calza para actividad física',
                'precio' => 20000.00,
                'imagen' => 'camiseta16.jpg',
                'imagen_hover' => 'camiseta16-atras.jpg',
                'fecha_creacion' => '2024-03-28',
                'categoria_id' => 6,
                'cantidad' => 10,
                'talles' => [2, 3, 4], // S, M, L
            ],
        ];

        foreach ($articulos as $data) {
            $talles = $data['talles'];
            unset($data['talles']);

            $articulo = Articulo::create($data);
            $articulo->talles()->sync($talles);
        }
    }
}
