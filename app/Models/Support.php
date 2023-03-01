<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'theme_id',
        'status_id',
        'text',
        'media'
    ];

    public function theme(){
        return $this->belongsTo(SupportTheme::class, 'theme_id', 'id');
    }

    public function status(){
        return $this->belongsTo(SupportStatus::class, 'status_id', 'id');
    }
}
