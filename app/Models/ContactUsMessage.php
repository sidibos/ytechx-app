<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Policies\ContactUsMessagePolicy;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

#[AuthorizesRequests(ContactUsMessagePolicy::class)]
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
