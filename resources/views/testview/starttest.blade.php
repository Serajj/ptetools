@extends('layouts.main')

@section('headcontent')

@endsection

@section('style')
   .topcontrol{
       height: 50px;
       border:2px solid red;
   }

@endsection

@section('content')
    
<div class="container-fade">
    <div class="row topcontrol">
        <div class="col-lg-1"></div>
    <div class="col-lg-8 p-1"><h3>{{$testname}} - {{ Auth::user()->name }}</h3></div>
        <div class="col-lg-3">
            
        </div>
    </div>
    <div class="row justify-content-center" id="main" style="height: 550px">
       
                 @if ($type=='CCL Trial Tests')
                 <div class='w3-card-4 p-1 mt-5 justify-content-center' id="ans" style='width:25%;height:50%; background-color: white;'>
                   
                        <div class='w3-container mt-5'>
                          <h1 class='card-text' style="text-align: center">Are you ready to take the Test?</h1> 
                          <center>
                          <form method="POST" action="{{route('test.begin')}}">
                            @csrf
                              <input type="text" name="testid" value="{{$tid}}" hidden>
                              <button class="btn btn-primary">Start Now</button>
                              </form>
                          </center>
                        </div>
                    </div>
               
                 @endif
                   
                 @if ($type=='Mock Test Series')
                 <div class='w3-card-4 p-1 mt-5 justify-content-center' id="ans" style='width:25%;height:50%; background-color: white;'>
                   
                    <div class='w3-container mt-5'>
                      <h1 class='card-text' style="text-align: center">Are you ready to take the Test?</h1> 
                      <center>
                        <form method="POST" action="{{route('test.begin')}}">
                            @csrf
                            <input type="text" name="testid" value="{{$tid}}" hidden>
                            <button class="btn btn-primary">Start Now</button>
                            </form>
                      </center>
                    </div>
                </div>
                 @endif

                 @if ($type=='Speaking Test Series')
                 <div class='w3-card-4 p-1 mt-5 justify-content-center' id="ans" style='width:25%;height:50%; background-color: white;'>
                   
                    <div class='w3-container mt-5'>
                      <h1 class='card-text' style="text-align: center">Are you ready to take the Test?</h1> 
                      <center>
                        <form method="POST" action="{{route('test.begin')}}">
                            @csrf
                            <input type="text" name="testid" value="{{$tid}}" hidden>
                            <button class="btn btn-primary">Start Now</button>
                        </form>
                      </center>
                    </div>
                </div>
                 @endif
        </div>
 
  

</div>

@endsection