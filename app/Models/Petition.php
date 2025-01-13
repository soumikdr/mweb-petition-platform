<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $fillable = [
        'petitioner_id',
        'title',
        'content',
        'status',
        'response',
    ];

    protected $casts = [
        'signatories' => 'array',
    ];
}
