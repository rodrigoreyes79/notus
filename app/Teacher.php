<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

/**
* @var  string
*/
protected $table = 'teachers';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}