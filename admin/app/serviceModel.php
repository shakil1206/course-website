<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceModel extends Model
{
    public $table = 'service';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
