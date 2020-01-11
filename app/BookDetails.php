<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDetails extends Model
{
    protected $fillable = ['book_id','chapter_no','chapter_name','sub_chapter_no','sub_chapter_name','meta_info'];
}
