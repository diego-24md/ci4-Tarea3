<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'razon_social'   => 'Empresa ABC S.A.C',
                'direccion'     => 'Av. Lima 123',
                'ruc'           => '20123456789',
                'telefono'      => '987654321',
                'representante' => 'Juan Pérez',
            ],
            [
                'razon_social'   => 'Distribuidora XYZ S.R.L',
                'direccion'     => 'Jr. Cusco 456',
                'ruc'           => '20987654321',
                'telefono'      => '912345678',
                'representante' => 'María García',
            ],
            [
                'razon_social'   => 'Comercial Norte E.I.R.L',
                'direccion'     => 'Calle Los Pinos 789',
                'ruc'           => '20456789123',
                'telefono'      => '923456789',
                'representante' => 'Carlos López',
            ],
        ];

        $this->db->table('proveedores')->insertBatch($data);
    }
}