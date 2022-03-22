<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'date'=>'datetime',
        'time'=>'datetime',
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }
}
