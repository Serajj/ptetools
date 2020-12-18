@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
    <a class="btn btn-success" href="{{route('admin.adduser')}}" >Add new user</a>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
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
                 
                </thead>
                <tbody>
                
                  @foreach ($userList as $user)
                  <tr>
                    <td>
                      {{$user->id}}
                    </td>
                    <td>
                      {{$user->name}}
                    </td>
                    <td>
                      {{$user->email}}
                    </td>
                    <td>
                      {{$user->type}}
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