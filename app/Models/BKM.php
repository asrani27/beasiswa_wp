<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKM extends Model
{
    use HasFactory;
    protected $table = 'nilai_bkm';
    protected $guarded = ['id'];
}
