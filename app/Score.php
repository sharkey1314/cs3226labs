<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['student_id', 'mc', 'tc', 'hw', 'pb', 'ks', 'ac'];

    public function student() {
        return $this->belongsTo('Student');
    }
}
