<?php

namespace App\Imports;

use App\Superheros;
use App\Features;
use App\Service;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

// use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class SuperherosImport implements ToModel,WithStartRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $service = new Service();
        // verifica si ya existe publisher y race, si no existe lo crea en la db y en ambos casos devuelve el id
        $publisherId = $service->publisher($row[15]);
        $raceId = $service->race($row[8]);
        
        // normaliza las medidas para insertar en la tabla un integer
        $height_in = $service->normalizeInt($row[9]);
        $height_cm = $service->normalizeInt($row[10]);
        $weight_lb = $service->normalizeInt($row[11]);
        $weight_kg = $service->normalizeInt($row[12]);

        $superhero = new Superheros;
        $superhero = Superheros::create([
           'name'     => $row[1],
           'fullName'     => $row[2],
           'publisher_id'  => $publisherId,
        ]);

        $superhero_features =  new Features([
            'superhero_id' => $superhero->id,
            'strength' => $row[3],
            'speed' => $row[4],
            'durability' => $row[5],
            'power' => $row[6],
            'combat' => $row[7],
            'height_in' => $height_in,
            'height_cm' => $height_cm,
            'weight_lb' => $weight_lb,
            'weight_kg' => $weight_kg,
            'eye_color' => $row[13],
            'hair_color' => $row[14],
            'race_id' => $raceId,
        ]);

        return $superhero_features;
    }
}


