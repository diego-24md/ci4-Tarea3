<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaProductos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'tipo'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'descripcion' => ['type' => 'VARCHAR', 'constraint' => 200],
            'precio'      => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'stock'       => ['type' => 'INT'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('productos');
    }

    public function down()
    {
        $this->forge->dropTable('productos');
    }
}