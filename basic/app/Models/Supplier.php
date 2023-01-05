<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // protected $guearded=[];


    protected $fillable = [
        'name',
        'mobile_number',
        'email',
        'address',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
