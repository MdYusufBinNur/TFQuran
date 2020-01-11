<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['publisher_name','publisher_info'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
