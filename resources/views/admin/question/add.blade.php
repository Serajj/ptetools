@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add New Question</h4>
            <p class="card-category">Add Question Details</p>
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('admin.addquestionpost')}}" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Category</label>
                    <select name="type" class="form-control" onchange="setSubType(this.value)" required>
                      <option value="Speaking">Speaking</option>
                      <option value="Listening">Listening</option>
                      <option value="Reading">Reading</option>
                      <option value="Writing" >Writing</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sub Category</label>
                    <select id="subtype" name="subtype" class="form-control" required>
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Additional Info</label>
                    <select name="addinfo" class="form-control" required>
                      <option value="Free">Free</option>
                      <option value="Premium">Premium</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Question</label>
                    <textarea rows="10" class="form-control" placeholder="Paste or Write Question here" name="question" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form">
                    <label class="bmd-label-floating">Audio</label>
                    <input type="file" class="form-control" name="audio">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Option-A</label>
                    <input type="text" class="form-control" name="a">
                  </div>
                </div>

               <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Option-B</label>
                    <input type="text" class="form-control" name="b">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Option-C</label>
                    <input type="text" class="form-control" name="c">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Option-D</label>
                    <input type="text" class="form-control" name="d">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correct</label>
                    <select name="correct" class="form-control">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </div>
                </div>
              </div>
             
              <button type="submit" class="btn btn-primary pull-right">Add Question</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <script>
    setSubType('Speaking');
    function setSubType(subtype){
          // alert(subtype);
           var sub=document.getElementById('subtype');

           if(subtype==='Speaking'){
            sub.innerHTML='<option value="Read Aloud">Read Aloud</option><option value="Repeat Sentence">Repeat Sentence</option><option value="Describe Image">Describe Image</option><option value="Retell Lecture">Retell Lecture</option><option value="Answer Short Question">Answer Short Question</option>';
           }
           if(subtype==='Listening'){
            sub.innerHTML='<option value="Summarize Spoken Text">Summarize Spoken Text</option><option value="Multiple Choice, Multiple Answer">Multiple Choice, Multiple Answer</option><option value="Fill in the blanks">Fill in the blanks</option><option value="Highlight Correct Summary">Highlight Correct Summary</option><option value="Multiple Choice, Single Answer">Multiple Choice, Single Answer</option><option value="Select Missing Word">Select Missing Word</option><option value="Highlight Incorrect Words">Highlight Incorrect Words</option><option value="Write From Dictation">Write From Dictation</option>';
           }
           if(subtype==='Reading'){
            sub.innerHTML='<option value="Reading & Writing Fill in the blanks">Reading & Writing Fill in the blanks</option><option value="Multiple Choice, Multiple Answer">Multiple Choice, Multiple Answer</option><option value="Re-order Paragraph">Re-order Paragraph</option><option value="Fill in the blanks (Drag and Drop)">Fill in the blanks (Drag and Drop)</option><option value="Multiple Choice, Single Answer">Multiple Choice, Single Answer</option>';
           }
           if(subtype==='Writing'){
            sub.innerHTML='<option value="Summerize Written Text">Summerize Written Text</option><option value="Essay">Essay</option>';
           }
           //<option value="Multiple Choice, Single Answer">AMultiple Choice, Single Answer</option>
           
    }
  </script>

@endsection