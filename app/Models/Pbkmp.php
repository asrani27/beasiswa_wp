<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbkmp extends Model
{
    use HasFactory;
    protected $table = 'pbkmp';
    protected $guarded = ['id'];
}