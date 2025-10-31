<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['group_id', 'surname', 'name'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
