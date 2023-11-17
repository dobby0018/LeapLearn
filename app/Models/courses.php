<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class courses extends Model
{
    use HasFactory;
    protected $table="courses";
    protected $primarykey="Course_id";
    protected $fillable=['Module_id'];
    public function Professors()
    {
        return $this->belongsTo(related:professors::class);
    }
    public function Modules()
    {
        return $this->hasMany(modules::class, 'Course_id', 'Course_id');
    }
}
