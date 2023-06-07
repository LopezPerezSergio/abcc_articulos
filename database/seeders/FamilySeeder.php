<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departaments = [
            [
                'name' => 'DOMESTICOS',
            ],
            [
                'name' => 'ELECTRONICA',
            ],
            [
                'name' => 'MUEBLE SUELTO',
            ],
            [
                'name' => 'SALAS, RECAMARAS, COMEDORES',
            ]
        ];

        foreach ($departaments as $departament) {
            Department::create($departament);
        }

        $category_domesticos = [
            [
                'department_id' => '1',
                'name' => 'COMESTIBLES',
            ],
            [
                'department_id' => '1',
                'name' => 'LICUADORAS',
            ],
            [
                'department_id' => '1',
                'name' => 'BATIDORAS',
            ],
            [
                'department_id' => '1',
                'name' => 'CAFETERAS',
            ]
        ];

        foreach ($category_domesticos as $category) {
            Category::create($category);
        }

        $familiy_comestibles = [
            'category_id' => '1',
            'name' => 'SIN NOMBRE',
        ];

        Family::create($familiy_comestibles);
    }
}
