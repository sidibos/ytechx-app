<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'quote_id', 
        'title', 
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function squad()
    {
        return $this->hasOne(Squad::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
