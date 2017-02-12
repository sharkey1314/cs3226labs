<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'nick', 'image', 'kattis', 'country_iso2', 'country_iso3'];

    public function score() {
        return $this.hasOne('Score');
    }
}
