<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'Guru';
    protected $primaryKey = 'id_guru';
    public $timestamps = false;
}
