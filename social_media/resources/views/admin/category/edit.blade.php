@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="mt-5">Edit Category</h1>
                <form action="{{route('category#edit',$category->category_id)}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" value="{{$category->title,old('title')}}" name="title" class="form-control" placeholder="Enter Category">          
                      @error('title')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="desc"  class="form-control" placeholder="Enter Description" cols="30" rows="10">{{$category->desc,old('desc')}}</textarea>
                      @error('desc')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection