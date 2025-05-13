<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function techExperts()
    {
        return $this->belongsToMany(User::class, 'squad_tech_expert', 'squad_id', 'tech_expert_id')->withPivot('job_title')->withTimestamps();
    }
}
