<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'm_country';
    protected $primaryKey = 'c_id';

    protected $casts = [
        'updated_at'
    ];
}
