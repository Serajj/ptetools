@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add Test</h4>
            <p class="card-category">Complete test data</p>
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('admin.addalltest')}}">
            @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Test Type</label>
                    <select name="type" class="form-control" required>
                      <option value="CCL Trial Tests">CCL Trial Tests</option>
                      <option value="Mock Test Series">Mock Test Series</option>
                      <option value="Speaking Test Series">Speaking Test Series</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Test Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Duration</label required>
                      <select name="duration" class="form-control" required>

                        @for ($i = 10; $i < 180; $i++)
                        <option value="{{$i}}">{{$i}} min</option>
                        @endfor
                        
                       
                        
                      </select>
                  </div>
                </div>
              </div>
             <button type="submit" class="btn btn-primary pull-right">Creat Test</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>


@endsection