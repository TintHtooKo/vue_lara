<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::select('posts.post_id','posts.title','posts.desc','posts.image','posts.category_id',
                            'categories.title as category_title')
                    ->leftJoin('categories','posts.category_id','categories.category_id')
                    ->get();
        $category = Category::get();
        return view('admin.post.index',compact('post','category'));
    }

    public function postCreate(Request $request) {
        $this->validatePost($request);
        $data = $this->postData($request);
        if ($request->hasFile('image')) {
            $filename = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('post'),$filename);
            $data['image'] = $filename;
        }
        Post::create($data);
        return back()->with(['success' => 'Post Created Successfully']);
    }

    public function postDelete($id) {
        $post = Post::where('post_id', $id)->first();
        Post::where('post_id',$id)->delete();
        if ($post->image && file_exists(public_path('post/') . $post->image)) {
            unlink(public_path('post/') . $post->image);
        }
        return back()->with(['delete' => 'Post Deleted Successfully']);
    }

    public function PostEditPage($id){
        $post = Post::where('post_id', $id)->first();
        $category = Category::get();
        return view('admin.post.edit',compact('post','category'));
    }

    public function PostEdit(Request $request, $id) {
        $this->validatePost($request);
        $data = $this->postData($request);
        if ($request->hasFile('image')) {
            if(file_exists(public_path('post/') . $request->oldImage)) {
                unlink(public_path('post/') . $request->oldImage);
            }
            $filename = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('post'),$filename);
            $data['image'] = $filename;
        }
        
        Post::where('post_id', $id)->update($data);
        return to_route('admin#post');
    }

    private function validatePost($request) {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'category' => 'required'
        ]);
    }

    private function postData($request) {
        return [
            'title' => $request->title,
            'desc' => $request->desc,
            'category_id' => $request->category
        ];
    }
}
