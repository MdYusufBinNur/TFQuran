<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable =['author_name','author_info'];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
