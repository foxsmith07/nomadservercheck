<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserisci i treni AGV-01 a AGV-25
        for ($i = 1; $i <= 25; $i++) {
            Train::create([
                'name' => 'AGV-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'number' => $i,
                'tipology' => 'deb10',
            ]);
        }

        // Inserisci i treni EVO-01 a EVO-26 (saltando il 41)
        for ($i = 31; $i <= 56; $i++) {
            if ($i != 41) {
                Train::create([
                    'name' => 'EVO-' . str_pad($i - 30, 2, '0', STR_PAD_LEFT),
                    'number' => $i,
                    'tipology' => 'deb10',
                ]);
            }
        }
    }
}
