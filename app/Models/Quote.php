<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_us_message_id', 
        'status', 
        'price_estimate', 
        'notes'
    ];

    public function contactUsMessage()
    {
        return $this->belongsTo(ContactUsMessage::class);
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
