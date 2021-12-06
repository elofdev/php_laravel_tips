<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Posts extends Model
{
    protected $table='posts';

    protected $fillable = [
        'author',
        'title',
        'subtitle',
        'content',
    ];

    public function  setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

}
