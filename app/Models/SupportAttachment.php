<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'support_id',
        'filename',
        'path',
    ];
}
