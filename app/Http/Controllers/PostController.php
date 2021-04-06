<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Jobs\PostJob;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'comments'])->where('user_id', auth()->id())->orderBy('id', 'desc')->paginate(10);
        return view('admins.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryPost::get(['id', 'name'])->pluck('name', 'id');
        return view('admins.posts.store',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->only('name','category_post_id','content');
        $data['user_id'] = auth()->id();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        $data['image'] = $imageName;
        $post = Post::create($data);
        session()->flash('message', 'Thêm bài viết thành công!');
        dispatch(new PostJob($post));
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admins.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorys = CategoryPost::whereNotIn('id',$post)->get();
        return view('admins.posts.edit',compact('categorys','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data = $request->only('name','category_post_id','content');
        $file = $request->image;
        if($file){
            $imageOld = public_path().'/images/'.$post->image;
            unlink($imageOld);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
            $post->update($data);
            session()->flash('message', 'Cập nhật bài viết thành công!');
            return redirect()->route('posts.index');
        }
        $post->update($data);
        session()->flash('message', 'Cập nhật bài viết thành công!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $fileImage = public_path().'/images/'.$post->image;
        unlink($fileImage);
        return Response()->json(['data'=>'delete'],200);
    }
}
