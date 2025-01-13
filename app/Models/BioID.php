<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BioID extends Model
{
    protected $table = 'bio_ids';

    protected $fillable = ['code', 'used'];

    public $timestamps = false;
}
