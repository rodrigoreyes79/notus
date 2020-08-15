<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassNote extends Model
{

    /**
     * @var  string
     */
    protected $table = 'class_notes';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }

    public function student() {
        return $this->belongsTo('App\User', 'student_id', 'id');
    }

    public function images() {
        return $this->hasMany(ClassNoteImage::class, 'class_note_id', 'id');
    }
}
