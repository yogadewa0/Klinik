<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'akun';
    // protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    public function getUser($username, $password)
    {
        return $this->where(['username' => $username, 'password' => $password])->first();
    }
}