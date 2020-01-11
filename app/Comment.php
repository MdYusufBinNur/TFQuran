<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =['book_name','author_name','chapter_sub','comments'];
}
