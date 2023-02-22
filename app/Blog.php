<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [

        'title',
        'sub_title',
        'details',
        'image',
        'status',
    ];

    public function createdBy()
    {
        return $this->belongsTo(Admins::class, 'created_by');
    }
}
