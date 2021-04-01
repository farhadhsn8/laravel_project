<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body' ,'name','email', 'status'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
