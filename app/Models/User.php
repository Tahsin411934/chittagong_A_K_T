<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Login'; // Ensure this is the correct table name
    public $timestamps = false; // Set to false if you don't want timestamps

    protected $fillable = [
        'UserName',
        'password',
        'Name',
        'Role',
        'Image',
        'Signature'
    ];



    // Automatically hash password when set

}
