<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rundown extends Model
{
    use HasFactory;
    protected $table = "rundowns";
    protected $fillable = ['description','start_time', 'end_time'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getTimeAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }

    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = Carbon::createFromFormat('H:i', $value)->format('H:i:s');
    }
}
