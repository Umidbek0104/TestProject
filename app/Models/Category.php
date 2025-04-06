<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_name','category_slug'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function test(){
        return $this->hasMany(Test::class);
    }
public function users()
{
   return $this->belongsTo(User::class);
}
}
