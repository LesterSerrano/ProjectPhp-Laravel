<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\Model;

class Estudiante extends Authenticable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'estudiante';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'pin',
    ];

    protected $hidden = [
        'pin',
    ];
}
