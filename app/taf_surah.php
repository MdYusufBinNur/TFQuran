<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taf_surah extends Model
{
    public $timestamps = false;
    protected $fillable = ['surah_intro','surah_name'];
}
