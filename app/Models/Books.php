<?php

namespace App\Models;

use CodeIgniter\Model;

class Books extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'IG_BOOKS';
    protected $primaryKey       = 'BK_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['BK_TITLE', 'BK_AUTHOR', 'BK_PUBLISHER', 'BK_GENRE', 'BK_LINK', 'BK_DESCRIPTION'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation

    //      Validação dos dados vindos do formulario
    protected $validationRules      = [
        'BK_TITLE' => 'required',
        'BK_AUTHOR' => 'required',
        'BK_PUBLISHER' => 'required',
        'BK_GENRE' => 'required',
        'BK_LINK' => 'required',
        'BK_DESCRIPTION' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
