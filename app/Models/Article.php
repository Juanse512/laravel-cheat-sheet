<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    // protected $fillable = ['title', 'excerpt', 'body'];
    public function path(){
      return route('articles.show', $this);
    }
    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }
    public function tags(){
      return $this->belongsToMany(Tag::Class);
    }
    use HasFactory;
}
