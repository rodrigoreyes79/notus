<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progenitor extends Model
{

/**
* @var  string
*/
protected $table = 'progenitors';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}