<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'details',
    ];

    protected $casts = [
        'details' => 'array',
        
    ];

    public static function rules() {
        return [
            
            // ...
            
            'details' => [
                'nullable',
                'array',
            ],
        ];
    }

    protected $hidden = ['created_at', 'updated_at', ];
}
