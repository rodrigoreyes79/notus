<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    /**
     * @var  string
     */
    protected $table = 'subjects';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function teachers(){
        return $this->belongsToMany(User::class, 'subject_teachers', 'user_id');
    }

    public function students(){
        return $this->belongsToMany(User::class, 'subject_students', 'user_id');
    }

    public function classNotes(){
        return $this->hasMany(ClassNote::class, 'subject_id');
    }
}
