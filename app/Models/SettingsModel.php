<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'blog_title',
        'blog_email',
        'blog_phone',
        'blog_meta_keywords',
        'blog_meta_desc',
        'blog_logo',
        'blog_favicon'
    ];

}
