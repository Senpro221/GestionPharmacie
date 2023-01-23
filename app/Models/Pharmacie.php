<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Pharmacie extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //use HasFactory,Searchable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
