<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modules extends Model
{
    use HasFactory;
    protected $table="modules";
    protected $primarykey="Module_id";
    public function course()
    {
        return $this->belongsTo(courses::class, 'Course_id', 'Course_id');
    }
}
