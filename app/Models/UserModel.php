<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'toper_usuarios';
    protected $primaryKey = 'tuser_id';
    protected $allowedFields = ['tuser_nombre', 'tuser_email', 'tuser_pass', 'tuser_fecha_creacion'];
}