<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
