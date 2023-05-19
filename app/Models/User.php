<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'u_id';
    
    protected $fillable = [
        "u_email",
        "u_password",
        "u_r_id",
        "u_name",
        "u_passpor_number",
        "u_passpor_img",
        "u_passpor_exp_date",
        "u_permit_date",
        "u_permit_exp_date",
        "u_payment_nominal",
        "u_payment_date",
        "u_img",
        "u_c_id",
        "u_cidb",
        "u_perkeso",
        "u_insuran",
        "u_number_phone",
        "created_at"
    ];

    protected $casts = [
        'updated_at' => 'datetime'
    ];
}
