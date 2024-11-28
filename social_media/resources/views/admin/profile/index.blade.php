@extends('admin.layout.app')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">User Profile</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              {{-- alert --}}
              @if (Session::has('updateSuccess'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('updateSuccess')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              {{-- alert end --}}
              <form action="{{route('update#admin')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="inputName" placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="inputEmail" placeholder="Email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" id="inputEmail" placeholder="Phone">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea name="address" class="form-control" placeholder="Address" id="" cols="30" rows="10">{{Auth::user()->address}}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender"  class="form-control" id="">
                        <option value="empty">Choose Your Option</option>
                        <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                      </select>
                    </div>
                  </div>
                
                
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn bg-dark text-white">Update</button>
                  </div>
                </div>
              </form>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <a href="{{route('change#password')}}">Change Password</a>
                </div>
              </div>
              
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection