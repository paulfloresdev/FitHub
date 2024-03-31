<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'rfc',
        'curp',
        'street',
        'int_num',
        'ext_num',
        'colony',
        'cp',
        'city',
        'state_id',
        'phone',
        'email',
        'rse',
        'person_type',
        'use_type',
        'user_id'
    ];
}
