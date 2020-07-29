<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

/**
* @var  string
*/
protected $table = 'students';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}