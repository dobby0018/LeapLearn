<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;
    protected $table="transactions";
    protected $primarykey="transaction_no";
    protected $fillable = ['transaction_id', 'course_id','user_id','payment'];
}
