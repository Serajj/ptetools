@extends('layouts.main')

@section('headcontent')


@endsection

@section('style')

@endsection

@section('content')



<div class="benefitssec" id="benefits">
    <div class="container">
      <div class="animation-wrapper aos-init aos-animate" data-aos="fade-up">
        <h2 class="frist-heading text-center">Series</h2>
        <div class="row justify-content-center mt-5">
          <div class="col-md-6">
            <div id="accordion" class="myaccordion">
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h2 class="mb-0">
                    <button
                      class="w-100 d-flex align-items-center justify-content-between btn btn-link"
                      data-toggle="collapse"
                      data-target="#collapseFour"
                      aria-expanded="true"
                      aria-controls="collapseFour"
                    >
                      CCL Trial Test
                      <span class="fa-stack fa-sm">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-minus fa-stack-1x fa-inverse"></i>
                        <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </button>
                  </h2>
                </div>
                <div
                  id="collapseFour"
                  class="collapse"
                  aria-labelledby="headingFour"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    <table class="table">
                      <thead>
                      <th>Name</th>
                      <th>Time</th>
                      <th>Action</th>
                      </thead>
                      
                      <tbody>
                        @foreach ($testData as $item)
                         @if ($item->type=='CCL Trial Tests')
                        <td>{{$item->test_name}}</td>
                          <td>{{$item->duration}} min</td>
                          <td><a href="{{route('test.start',['id'=>$item->id])}}" class="btn btn-success">Start</a></td>
                            
                         @endif
                      @endforeach
                      </tbody>
                    </table>
                      
                      
                     
                   
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                    <button
                      class="w-100 d-flex align-items-center justify-content-between btn btn-link collapsed"
                      data-toggle="collapse"
                      data-target="#collapseFive"
                      aria-expanded="false"
                      aria-controls="collapseFive"
                    >
                      Mock Test Series
                      <span class="fa-stack">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                        <i class="fa fa-minus fa-stack-1x fa-inverse"></i>
                      </span>
                    </button>
                  </h2>
                </div>
                <div
                  id="collapseFive"
                  class="collapse"
                  aria-labelledby="headingFive"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    <table class="table">
                      <thead>
                      <th>Name</th>
                      <th>Time</th>
                      <th>Action</th>
                      </thead>
                      
                      <tbody>
                        @foreach ($testData as $item)
                         @if ($item->type=='Mock Test Series')
                        <td>{{$item->test_name}}</td>
                          <td>{{$item->duration}} min</td>
                          <td><a href="{{route('test.start',['id'=>$item->id])}}" class="btn btn-success">Start</a></td>
                            
                         @endif
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingSix">
                  <h2 class="mb-0">
                    <button
                      class="w-100 d-flex align-items-center justify-content-between btn btn-link collapsed"
                      data-toggle="collapse"
                      data-target="#collapseSix"
                      aria-expanded="false"
                      aria-controls="collapseSix"
                    >
                      Speaking Test Series
                      <span class="fa-stack">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                        <i class="fa fa-minus fa-stack-1x fa-inverse"></i>
                      </span>
                    </button>
                  </h2>
                </div>
                <div
                  id="collapseSix"
                  class="collapse"
                  aria-labelledby="headingSix"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    <table class="table">
                      <thead>
                      <th>Name</th>
                      <th>Time</th>
                      <th>Action</th>
                      </thead>
                      
                      <tbody>
                        @foreach ($testData as $item)
                         @if ($item->type=='Speaking Test Series')
                        <td>{{$item->test_name}}</td>
                          <td>{{$item->duration}} min</td>
                          <td><a href="{{route('test.start',['id'=>$item->id])}}" class="btn btn-success">Start</a></td>
                            
                         @endif
                      @endforeach
                      </tbody>
                    </table>
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



