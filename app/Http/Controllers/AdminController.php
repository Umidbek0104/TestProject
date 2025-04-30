<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreTestRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Test;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }


    public function createPost()
    {
        $categories=Category::all();
        return view('admin.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePost(PostRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('admin.all.posts')->with('success', 'Post muvaffaqiyatli yaratildi!');

    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPost( $id)
    {
        $post=Post::findorFail($id);
        $categories=Category::all();
        return view('admin.editPost',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePost(PostRequest $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());

        return redirect()->route('admin.all.posts', $post->id)->with('success', 'Post yangilandi!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPost(string $id)
    {
        $post = Post::findOrFail($id); // O'chirish uchun postni topish
        $comments=Comment::all();
        $post->comments()->delete();
        $post->delete(); // Postni o'chirish

        return redirect()->route('admin.all.posts')
            ->with('success', 'Post muvaffaqiyatli o‘chirildi!');
    }
    public function allPosts()
    {
        $posts = Post::all();
        return view('admin.posts',compact('posts'));
    }

    public function allCategories()
    {
        $categories=Category::withCount('posts')->get();
        return view('admin.catigories',compact('categories'));
    }
    public function createCategory()
    {
        return view('admin.createCategory');
    }
    public function storeCategory(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.all.categories')->with('success', 'Kategoriya qo\'shildi!');
    }
    public function editCategory($id){
        $category=Category::all()->find($id);
        return view('admin.editCategory',compact('category'));
    }
    public function updateCategory(StoreCategoryRequest $request,$id){
        $category=Category::all()->find($id);
        $category->update($request->validated());
        return redirect()->route('admin.all.categories')->with('success', 'Kategoriya qo\'shildi!');
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);

        // Avval kategoriya bilan bog‘liq post va testlarni o‘chirish (agar kerak bo‘lsa)
        foreach ($category->posts as $post) {
            $post->comments()->delete(); // har bir postning commentlarini o‘chiramiz
            $post->delete(); // postni o‘chiramiz
        }

        foreach ($category->test as $test) {
            $test->delete(); // testlarni ham o‘chiramiz
        }

        // Endi kategoriyani o‘chirish
        $category->delete();

        return redirect()->route('admin.all.categories')->with('success', 'Kategoriya muvaffaqiyatli o‘chirildi.');
    }

    public function testsIndex()
    {
        $tests=Test::all();
        return view('admin.Tests',compact('tests'));
    }

    public function createTest(){
        $categories=Category::all();
        return view('admin.createTest',compact('categories'));
    }
    public function storeTest(StoreTestRequest $request)
    {
        Test::create($request->validated());
        return redirect()->route('admin.all.tests')->with('success', 'Test muvaffaqiyati!');
    }
    public function editTest($id)
    {
        $test=Test::all()->find($id);
        $categories=Category::all();
        return view('admin.editTest',compact('test','categories'));
    }
    public function updateTest(StoreTestRequest $request,$id){
        $test=Test::all()->find($id);
        $test->update($request->validated());
        return redirect()->route('admin.all.tests')->with('success', 'Test muvaffaqiyati!');
    }

    public function deleteTest($id){
        $test=Test::all()->find($id);
//        $test->comments()->delete();
        $test->delete();
        return redirect()->route('admin.all.tests')->with('success', 'Test muvaffaqiyati!');
    }


}
