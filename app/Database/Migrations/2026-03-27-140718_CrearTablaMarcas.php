<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaMarcas extends Migration
{
    public function up()
    {
        //Se definen los campos
        $this->forge->addField([
            "id" => [
                "type"=> "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "marca" => [
                "type"=> "VARCHAR",
                "constraint" => 50,
                "null" => false,
            ],
            "create_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "update_at" => [
                "type"=> "DATETIME",
                "null" => true,
            ]
        ]);

        //Se definen las restricciones (claves)
        $this->forge->addPrimaryKey("id");
        $this->forge->addUniqueKey("marca"); //singular (campo)

        //Se construye la tabla
        $this->forge->createTable("marcas"); //plural (nombre de la tabla)
    }

    public function down()
    {
        //Rollback
        $this->forge->dropTable("marcas");
    }
}
