<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student as StudentEloquent;

class Score extends Model
{
    protected $table = 'scores';

    public function student(){
        return $this->belongsTo(StudentEloquent::class);
    }
    
    public function scopeOrderByTotal($query){
        return $query->orderBy('scores.total', 'DESC');
    }

    public function scopeOrderBySubject($query){
        return $query->orderBy('scores.chinese', 'DESC')
            ->orderBy('scores.english', 'DESC')
            ->orderBy('scores.math', 'DESC');
    }              

}
