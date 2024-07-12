<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDepartmentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'dept_id_no' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'dept_code' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'dept_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'ordering'=>[
                'type'=>'INT',
                'constraint'=>11,
                'default'=>10000,
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('departments');
    }

    public function down()
    {
        $this->forge->dropTable('departments');
    }
}
