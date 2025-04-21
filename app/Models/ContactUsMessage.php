<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model
{
    protected $fillable = [
        'title',
        'name', 
        'email', 
        'phone',
        'message',
        'status', 
        'budget'
    ];
}
