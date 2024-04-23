<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            'name' => 'Admin',
            'email' => 'admin_ffi@fisherfarms.ph',
            'username' => 'adminffi',
            'password'=> password_hash('admin12345', PASSWORD_BCRYPT),
        );

        // array(
            // 'name' => 'Test',
            // 'email' => 'test_admin@fisherfarms.ph',
            // 'username' => 'testadmin',
            // 'password'=> password_hash('test12345', PASSWORD_BCRYPT),
        // ),


        $this->db->table('users')->insert($data);
    }
}
