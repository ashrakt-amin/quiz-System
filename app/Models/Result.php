<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'quiz_id',
        'quiz_score',
        'achieved_score'
      ];

      public function quiz(){
       return $this->belongsTo(Quiz::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

}
