<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table            = 'departments';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'dept_id_no',
        'dept_code',
        'dept_name',
        'ordering',
    ];


}
