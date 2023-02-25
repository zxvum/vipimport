<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hex'
    ];
}
