<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
    	$posts = Post::with('category')->orderBy('id','desc')->paginate(10);
    	return view('pages.posts.index',compact('posts'));
    }

    public function admin(){
    	return view('admin_layout');
    }

    public function showpost($id){
    	$post = Post::with('comments.user')->where('id',$id)->orderBy('id','desc')->first();
    	$postRelates = Post::with('category')->where('category_post_id', $post->category->id)
    	->whereNotIn('id',[$id])->orderBy('id','desc')->paginate(2);

    	return view('pages.posts.show',compact('post','postRelates'));
    }
}
