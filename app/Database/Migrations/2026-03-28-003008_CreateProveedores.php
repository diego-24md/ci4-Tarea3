<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaProveedores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'razon_social' => ['type' => 'VARCHAR', 'constraint' => 200],
            'direccion'    => ['type' => 'VARCHAR', 'constraint' => 200],
            'ruc'          => ['type' => 'VARCHAR', 'constraint' => 11],
            'telefono'     => ['type' => 'VARCHAR', 'constraint' => 9],
            'representante'=> ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('proveedores');
    }

    public function down()
    {
        $this->forge->dropTable('proveedores');
    }
}