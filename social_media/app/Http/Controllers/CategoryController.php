<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::select('categories.category_id','categories.title','categories.desc')
                            ->when(request('search'),function($query){
                                $query->whereAny(['categories.title','categories.desc'],
                                'like','%'.request('search').'%');
                            })
                            ->get();
        return view('admin.category.index',compact('category'));
    }

    public function categoryCreate(Request $request){
        $this->validateCategory($request);
        $data = $this->categoryData($request);
        Category::create($data);
        return back()->with(['createSuccess'=>'Category Created Successfully']);
    }

    public function categoryDelete($id){
        Category::where('category_id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted Successfully']);
    }

    public function categoryEditPage($id){
        $category = Category::where('category_id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    public function categoryEdit(Request $request,$id){
        $this->validateCategory($request);
        $data = $this->categoryData($request);
        Category::where('category_id',$id)->update($data);
        return to_route('admin#category');
    }

    private function validateCategory($request){
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
    }

    private function categoryData($request){
        return [
            'title' => $request->title,
            'desc' => $request->desc
        ];
    }
}
