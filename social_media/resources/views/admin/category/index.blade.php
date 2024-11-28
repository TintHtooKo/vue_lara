@extends('admin.layout.app')
@section('content')
<div class="col-4">
  <div class="card">
    <div class="card-body">
      @if (Session::has('createSuccess'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('createSuccess')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <form action="{{route('category#create')}}" method="post">
        @csrf
        <div class="form-group">
          <label>Category Name</label>
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

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
<div class="col-7 offset-1">
    <div class="card">
      @if (Session::has('deleteSuccess'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{Session::get('deleteSuccess')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="card-header">
        <h3 class="card-title">Category List</h3>

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
              <th>Category Name</th>
              <th>Description</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $item)
            <tr>
              <td>{{$item->category_id}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->desc}}</td>
              <td>
                <a href="{{route('category#editPage',$item->category_id)}}">
                  <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                </a>
                
                <a href="{{route('category#delete',$item->category_id)}}">
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