@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
      
    <a class="btn btn-success" href="{{route('admin.addalltest')}}" >Add new test</a>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Test</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Test ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Type
                  </th>
                  <th>
                    Time
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                
                  @foreach ($testList as $test)
                  <tr>
                    <td>
                      {{$test->id}}
                    </td>
                    <td>
                      {{$test->test_name}}
                    </td>
                    <td>
                      {{$test->type}}
                    </td>
                    <td>
                      {{$test->duration}}
                    </td>
                    
                    <td class="text-primary">
                      <a href="{{route('admin.testdelete',['id'=>$test->id])}}" class="btn btn-danger"><span class="material-icons">delete </span></a>
                    </td>
                  </tr>
                 
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>


@endsection