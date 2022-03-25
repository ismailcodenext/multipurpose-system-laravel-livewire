<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'SCHEDULED' => 'primary',
            'CLOSED' => 'success',
        ];
        return $badges[$this->status];
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDate();
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->toFormattedTime();
    }
}
