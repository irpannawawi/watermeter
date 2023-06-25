<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;
    protected $table = 'log_water';
    protected $fillable = ['debit_air', 'status', 'user_id'];

}
