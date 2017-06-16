<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'comment_count', 'source', 'avatar', 'author_name'];
}
