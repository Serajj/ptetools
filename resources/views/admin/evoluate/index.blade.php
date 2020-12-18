@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
    <a class="btn btn-success" href="{{route('admin.adduser')}}" >Add new user</a>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Test Data For Evolution</h4>
            <p class="card-category"> Here is a test data for evolution</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Member Type
                  </th>
                  <th>
                    Category
                  </th>
                  <th>
                    Subcategory
                  </th>

                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                
                  @foreach ($testDataList as $testData)
                  <tr>
                    <td>
                      {{$testData->id}}
                    </td>
                    <td>
                      {{$testData->name}}
                    </td>
                    <td>
                      {{$testData->email}}
                    </td>
                    <td>
                      {{$testData->member}}
                    </td>
                    <td>
                      {{$testData->type}}
                    </td>
                    <td>
                      {{$testData->subtype}}
                    </td>
                    <td class="text-primary">
                    <a href="{{route('admin.evoluate',['id'=>$testData->id])}}" class="btn btn-primary">Evoluate</a>
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