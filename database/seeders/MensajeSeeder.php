<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MensajeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mensajes')->insert([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'mensaje' => 'Hola, me interesa saber más sobre sus productos.',
            'fecha_envio' => Carbon::now(),
        ]);
    }
}
