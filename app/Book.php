<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['book_name','author_name','publisher_name','category_name','topics','language','book_image','status','type'];




    public function author()
    {
        return $this->hasMany(Author::class);
    }
    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function publisher()
    {
        return $this->hasMany(Publisher::class);
    }
}
