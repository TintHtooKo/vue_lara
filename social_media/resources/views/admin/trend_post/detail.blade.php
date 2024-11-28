@extends('admin.layout.app')
@section('content')
<div class="col-6 offset-3 mt-5">
    <button class="btn bg-dark text-white">
        <a href="{{route('admin#trend_post')}}">
            <i class="fas fa-arrow-left"></i>
        </a>
    </button>
    <div class="card-header">
        @if ($post->image)
        <img src="{{asset('/post/'.$post->image)}}" width="300px">
        @else
        <img src="{{asset('default.webp')}}" width="300px">
        @endif
    </div>
    <div class="card-body">
        <h3>{{$post->title}}</h3>
        <p>{{$post->desc}}</p>
    </div>
    <!-- /.card -->
    
  </div>
  
@endsection