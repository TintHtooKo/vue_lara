@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="mt-5">Edit Category</h1>
                <form action="{{route('admin#postEdit',$post->post_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Post Title</label>
                      <input type="text" value="{{$post->title,old('title')}}" name="title" class="form-control" placeholder="Enter Title">          
                      @error('title')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="desc"  class="form-control" placeholder="Enter Description" cols="30" rows="10">{{$post->desc,old('desc')}}</textarea>
                      @error('desc')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category" id="" class="form-control">
                        <option value="">Choose Your Option</option>
                        @foreach ($category as $item)
                        <option value="{{$item->category_id}}" @if ($post->category_id == $item->category_id || old('category') == $item->category_id) selected @endif>{{$item->title}}</option>
                        @endforeach
                      </select>          
                      @error('category')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label>Post Image</label>
                      <input type="hidden" name="oldImage" value="{{$post->image}}">
                      <input type="file" value="{{$post->image,old('image')}}" name="image" class="form-control" placeholder="Enter Category">          
                      @error('image')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection