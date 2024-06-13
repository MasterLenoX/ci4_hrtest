<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateEmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('employees',[
            'ordering'=>[
                'type'=>'INT',
                'constraint'=>11,
                'default'=>10000,
            ],
        ]);

    }

    public function down()
    {
        $this->forge->dropColumn('employees','ordering');
    }
}
