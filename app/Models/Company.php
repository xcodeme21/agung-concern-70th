<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "companies";
    protected $fillable = ['company_name'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
