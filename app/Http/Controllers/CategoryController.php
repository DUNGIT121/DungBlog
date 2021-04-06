<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\CategoryPost;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = CategoryPost::where('user_id', auth()->id())->orderBy('id','desc')->paginate(5);
        return view('admins.categorys.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categorys.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->only('name', 'description');
        $data['user_id'] = auth()->id();
        CategoryPost::create($data);
        session()->flash('message', 'thêm danh mục bài viết thành công!');
        return redirect()->route('categorys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryPost $category)
    {
        return view('admins.categorys.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $category)
    {
        return view('admins.categorys.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, CategoryPost $category)
    {
        $data = $request->only('name','description');
        $category->update($data);
        session()->flash('message', 'Cập nhật danh mục bài viết thành công!');
        return redirect()->route('categorys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryPost $category)
    {
        $category->delete();
        return response()->json(['data'=>'delete'],200);
    }
}
