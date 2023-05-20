<?php

namespace App\Models\transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = "salary";
    protected $primaryKey = "s_id";
    
    protected $fillable = [
        's_id',
        's_u_id',
        's_date',
        's_nominal',
        's_currency',
        's_slip_img',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'updated_at'
    ];
}
