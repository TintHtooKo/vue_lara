@extends('admin.layout.app')
@section('content')
<div class="col-4">
  <div class="card">
    <div class="card-body">
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('success')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <form action="{{route('admin#postCreate')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Post Title</label>
          <input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="Enter Category">          
          @error('title')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Description</label>
          <textarea name="desc"  class="form-control" placeholder="Enter Description" cols="30" rows="10">{{old('desc')}}</textarea>
          @error('desc')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Category</label>
          <select name="category" id="" class="form-control">
            <option value="">Choose Your Option</option>
            @foreach ($category as $item)
            <option value="{{$item->category_id}}" @if (old('category') == $item->category_id) selected @endif>{{$item->title}}</option>
            @endforeach
          </select>          
          @error('category')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Post Image</label>
          <input type="file" value="{{old('image')}}" name="image" class="form-control" placeholder="Enter Category">          
          @error('image')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
<div class="col-7 offset-1">
    <div class="card">
      @if (Session::has('delete'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{Session::get('delete')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="card-header">
        <h3 class="card-title">Post List</h3>

        <div class="card-tools">
          <form action="{{route('admin#category')}}" method="get">
            @csrf
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="search" value="{{request('search')}}" class="form-control float-right" placeholder="Search">
  
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th> ID</th>
              <th>Image</th>
              <th>Post Title</th>
              <th>Description</th>
              <th>Category</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post as $item)
            <tr>
              <td>{{$item->post_id}}</td>
              <td>
                @if ($item->image)
                <img src="{{asset('/post/'.$item->image)}}" width="100px">
                @else
                <img src="{{asset('default.webp')}}" width="100px">
                @endif
              </td>
              <td>{{$item->title}}</td>
              <td>{{$item->desc}}</td>
              <td>{{$item->category_title}}</td>
              <td>
                <a href="{{route('admin#postEditPage',$item->post_id)}}">
                  <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                </a>
                
                <a href="{{route('admin#postDelete',$item->post_id)}}">
                  <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                </a>
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection