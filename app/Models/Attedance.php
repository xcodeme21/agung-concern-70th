<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attedance extends Model
{
    use HasFactory;
    protected $table = "attedances";
    protected $fillable = ['firstname','lastname','email','phonenumber','company_name','food_preferences', 'attend', 'queue', 'confirmation', 'seat'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
