@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
    <a class="btn btn-success" href="{{route('admin.addquestion')}}" >Add new question</a>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Qusetions</h4>
            <p class="card-category">All Questions</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Question ID
                  </th>
                  <th>
                    Category
                  </th>
                  <th>
                    Sub-Category
                  </th>
                  <th>
                    Question
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                
                  @foreach ($questionList as $question)
                  <tr>
                    <td>
                      {{$question->id}}
                    </td>
                    <td>
                      {{$question->type}}
                    </td>
                    <td>
                      {{$question->subtype}}
                    </td>
                    <td style="max-width: 400px;">
                      {{$question->question}}
              
                    </td>
                    <td class="text-primary">
                      <a href="" class="btn btn-primary" onclick="addtotest('{{$question->id}}')" data-toggle="modal" data-target="#exampleModalCenter"><span class="material-icons">preview</span></a>
                      <a href="" class="btn btn-warning"><span class="material-icons">edit </span></a>
                      <a href="{{route('admin.questiondelete',['id'=>$question->id])}}" class="btn btn-danger"><span class="material-icons">delete </span></a>
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

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><span id="qnoatt"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="formfirst" action="{{route('admin.addtotest')}}" method="POST">
          @csrf
            <select class="form-control" name="testId">
              @foreach ($testData as $item)
            <option value="{{$item->id}}">{{$item->test_name}}</option>
              @endforeach
             
            </select>

            <input type="text" id="qqid" name="qid" hidden/>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Question</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    function addtotest(id){
       
       document.getElementById('qnoatt').innerHTML="Add Qusetion With Question Id "+id+" to ";

       document.getElementById('qqid').value=id;
    }
  </script>
@endsection