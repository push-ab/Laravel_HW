<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['title', 'start_from', 'is_active'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
