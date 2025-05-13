<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id', 
        'tech_expert_id', 
        'title', 
        'description', 
        'status'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function techExpert()
    {
        return $this->belongsTo(User::class, 'tech_expert_id');
    }
}
