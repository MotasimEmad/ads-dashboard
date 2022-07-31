<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Information extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
