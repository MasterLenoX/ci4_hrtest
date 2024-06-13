<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'emp_id_no',
        'emp_firstname',
        'emp_midname',
        'emp_lastname',
        'emp_dob',
        'emp_pob',
        'emp_location_add',
        'emp_email_add',
        'emp_contact_no',
        'ordering'
    ];

}
