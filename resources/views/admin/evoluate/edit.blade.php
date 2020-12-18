@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
<a href="{{route('admin.evolution')}}" class="btn btn-warning">Back</a>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Evoluation</h4>
            <p class="card-category">Evoluate given answer</p>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
               @if ($question->audio!=null)
               <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Audio Data (Question)</label>
                  <audio controls>
                    <source src="{{asset('assets/question')}}/{{$question->audio}}" type="audio/mp3">
                  Your browser does not support the audio element.
                  </audio>
               
                </div>
              </div>
                   
               @endif
              @if ($question->image!=null)
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Image Data</label>
                  <img src="{{asset('assets/question')}}/{{$question->image}}" class="form-control">
                </div>
              </div>
                  
              @endif
                
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Question</label>
                    <p>{{$question->question}}</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correct Option</label>
                  <p>{{$question->correct?$question->correct:"This Question has no options"}}</p>
                  </div>
                </div>
              </div>
              <div class="row">
               @if ($userdata->data!=null)
               <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">User Data (Answer)</label>
                  <audio controls>
                    <source src="{{asset('assets/uploadedaudio')}}/{{$userdata->data}}" type="audio/mp3">
                  Your browser does not support the audio element.
                  </audio>
                </div>
              </div>
               @else
                   <p>{{$userdata->data}}</p>
               @endif
                
              </div>
   
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
           
            </a>
          </div>
          <div class="card-body mt-5">
            <h4 class="card-title">Give Marks Here</h4>
            <div class="form-group">
            <div class="row">
             
                <div class="col-md-4">
                    <label class="bmd-label-floating">Mark Obtain</label>
                     <input class="form-control" />
                  </div>
               

                
                  <div class="col-md-4">
                      <label class="bmd-label-floating">Total Mark</label>
                       <input class="form-control" />
                    </div>
                  
                
              </div>
             
            </div>
          </div>
            <a href="javascript:;" onclick="alert('saved')" class="btn btn-primary btn-round">Submit</a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection