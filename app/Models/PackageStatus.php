<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hex'
    ];

    public function package(){
        return $this->hasOne(Package::class, 'status_id', 'id');
    }
}
