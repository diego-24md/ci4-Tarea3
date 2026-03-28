<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tipo'        => 'Electrónica',
                'descripcion' => 'Laptop HP 14 pulgadas',
                'precio'      => 2500.00,
                'stock'       => 10
            ],
            [
                'tipo'        => 'Electrónica',
                'descripcion' => 'Monitor LG 24 pulgadas',
                'precio'      => 1100.00,
                'stock'       => 8
            ],
            [
                'tipo'        => 'Accesorios',
                'descripcion' => 'Teclado mecánico RGB',
                'precio'      => 320.00,
                'stock'       => 15
            ],
            [
                'tipo'        => 'Accesorios',
                'descripcion' => 'Mouse inalámbrico',
                'precio'      => 150.00,
                'stock'       => 20
            ],
            [
                'tipo'        => 'Audio',
                'descripcion' => 'Auriculares Sony WH-1000',
                'precio'      => 480.00,
                'stock'       => 5
            ],
        ];

        $this->db->table('productos')->insertBatch($data);
    }
}