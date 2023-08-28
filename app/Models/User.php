<?php

namespace App\Models;

use CodeIgniter\Model;
//      Modal referente às queries do usuario   //
class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'IG_USERS';
    protected $primaryKey       = 'US_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['US_EMAIL', 'US_PASS'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation

    //      validação dos dados do formulario de cadastro   //
    protected $validationRules      = [
        'US_EMAIL' => 'required',
        'US_PASS' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPass'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    //      Fazendo criptografia da senha para adicionar ao banco       //
    protected function hashPass(array $data)
    {
        $data['data']['US_PASS'] = password_hash($data['data']['US_PASS'], PASSWORD_DEFAULT);
        return $data;
    }
}
