<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_posts';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'user_id','name','description'
    ];

    public $timestamp = false;


    // public function posts(){
    // 	return $this->hasMany(Post::class, 'category_post_id');
    // }
}
