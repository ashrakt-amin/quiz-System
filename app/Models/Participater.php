<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participater extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'quiz_id'
      ];
}
