@extends('admin.layout.app')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Trend Post </h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th> ID</th>
              <th>Post Title</th>
              <th>Image</th>
              <th>View Count</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <td>{{$item->post_id}}</td>
              <td>{{$item->title}}</td>
              <td>
                @if ($item->image)
                <img src="{{asset('/post/'.$item->image)}}" width="100px">
                @else
                <img src="{{asset('default.webp')}}" width="100px">
                @endif
              </td>
              <td>{{$item->post_count}}</td>
              <td>
                <a href="{{route('admin#trend_postDetail',$item->post_id)}}" class="btn btn-sm bg-dark text-white"><i class="fas fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
      {{-- <div class="d-flex justify-content-end">
        {{$data->links()}}
      </div> --}}
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection