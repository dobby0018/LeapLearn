<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchased extends Model
{
    use HasFactory;
    protected $table="coursepurchased";
    protected $primarykey="Purchase_no";
}
