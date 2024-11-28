@extends('admin.layout.app')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">Change Password</legend>
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
              @if (Session::has('updateError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{Session::get('updateError')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              {{-- alert end --}}
              <form action="{{route('change#passwordAdmin')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                  <label for="inputName" class="col-sm-4 col-form-label">Old Password</label>
                  <div class="col-sm-8">
                    <input type="password" name="oldpassword" class="form-control" id="inputName" placeholder="Old Password">
                    @error('oldpassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-4 col-form-label">New Password</label>
                  <div class="col-sm-8">
                    <input type="password" name="newpassword" class="form-control" id="inputEmail" placeholder="New Password">
                    @error('newpassword')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="confirmPassword" class="form-control" id="inputEmail" placeholder="Confirm Password">
                      @error('confirmPassword')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                
                
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-8">
                    <button type="submit" class="btn bg-dark text-white">Change</button>
                  </div>
                </div>
              </form>
              
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection