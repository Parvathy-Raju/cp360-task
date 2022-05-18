<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone_number',
        'gender',
    ];
    protected $hidden = ['created_at', 'updated_at', ];
}
