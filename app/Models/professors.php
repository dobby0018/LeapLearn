<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class professors extends Authenticatable
{
    use HasFactory;
    protected $table="professors";
    protected $primarykey="Professor_id";
}
