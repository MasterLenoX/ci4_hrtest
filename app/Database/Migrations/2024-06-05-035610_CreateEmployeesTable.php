<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'emp_id_no'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100'
            ],
            'emp_firstname'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'emp_midname'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'emp_lastname'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'emp_dob'=>[
                'type'=>'DATETIME',
            ],
            'emp_pob'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'emp_location_add'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'emp_email_add'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'emp_contact_no'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255'
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('employees');

    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
