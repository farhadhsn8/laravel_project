<?php

namespace App\frontmodels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name' , 'slug'];
    //use HasFactory;
//رابطه چند به چند بین دو جدول ارتیکل و کتگوری
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
