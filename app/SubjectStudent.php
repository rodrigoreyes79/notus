<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectStudent extends Model
{

    /**
     * @var  string
     */
    protected $table = 'subject_students';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }
}
