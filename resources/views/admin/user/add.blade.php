@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('admin.adduserpost')}}">
            @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="number" class="form-control" name="phone">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label required>
                    <input type="email" name="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Member Type</label>
                    <select name="type" class="form-control" required>
                      <option value="Free">Free</option>
                      <option value="Premium">Premium</option>
                    </select>
                  </div>
                </div>
              <button type="submit" class="btn btn-primary pull-right">Creat User</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>


@endsection