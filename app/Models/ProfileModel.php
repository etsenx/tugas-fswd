<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'address',
        'study_program',
        'photo',
        'instagram',
        'youtube',
        'tiktok'
    ];
}
