<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassNoteImage extends Model
{

    /**
     * @var  string
     */
    protected $table = 'class_note_images';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function classNote()
    {
        return $this->belongsTo(ClassNote::class, 'class_note_id', 'id');
    }
}
