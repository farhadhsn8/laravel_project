<?php

namespace App\frontmodels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug','status','user_id','description','image'];

    protected $attributes =[
        'hit' =>1
    ];
//رابطه چند به چند بین دو جدول ارتیکل و کتگوری

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
//ارتباط یک به چند
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()//یرای سئو
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
