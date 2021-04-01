<?php

namespace App\Models;

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
//یک ارتیکل تعداد زیادی کامنت دارد
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()//یرای سئو
    {
        return 'slug';
    }
}
