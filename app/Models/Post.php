<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryPost;
use App\Models\Comment;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'user_id','category_post_id','name','image','content'
    ];

    public $timestamp = false;

    public function category(){
    	return $this->belongsTo(CategoryPost::class, 'category_post_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
