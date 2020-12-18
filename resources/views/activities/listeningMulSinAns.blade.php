@extends('layouts.main')

@section('content')
<section id="section" style="min-height:400px">
<div class="container justify-content-center">
    <h4><i>Listen to the recording and answer the multi-choice question by selecting the correct response. Only one response is correct.    </i></h4> 

    <div class="row justify-content-center m-5">
        <div class='w3-card-4 p-1' style='width:25%; background-color: white;'> 
            <div class='w3-container'> 
                <p class='card-text'>Status : <span id='SpeakingRecStatus'>Playing</span></p>
                <Audio></Audio>
                 <div class='w3-light-grey m-2'> 
                     <div id='listeningqbar' class='w3-green' style='height:24px;width:0'>
                    </div> 
                </div>
             </div>
        </div> 
</div>


</div>

<div class="row justify-content-center">
    <ul style="list-style: none">
        <li>

            <h3>CSS Stands for...</h3>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                <label for="question-1-answers-A">A) Computer Styled Sections </label>
            </div>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                <label for="question-1-answers-B">B) Cascading Style Sheets</label>
            </div>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                <label for="question-1-answers-C">C) Crazy Solid Shapes</label>
            </div>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                <label for="question-1-answers-D">D) None of the above</label>
            </div>
        
        </li>
    </ul>
</div>

<div class="row justify-content-center" id="control">
    

    


</div>
</section>
<script>
    var cont=document.getElementById('control');
    var audio = new Audio('{{asset("assets/demo/demo.wav")}}');
    audio.play();

var width = 0;
    function sapb(duration,id){
        cont.innerHTML='<button class="btn btn-success" onclick="stopPlay()">Stop</button>';
        width=0;
    var elem = document.getElementById(id);   
    
    var id = setInterval(frame,duration);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        cont.innerHTML='<button class="btn btn-warning m-2" onclick="listenAgain()">Listen Again</button> <button class="btn btn-success m-2" onclick="saveData()">Submit</button><select style="height:40px" class="btn btn-success" onchange="selectQuestion(this.value)">@for ($i = 0; $i <= $tq; $i++)<option value="{{ $i }}">{{ $i+1 }}</option>@endfor</select>';
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }
}

sapb(1000,"listeningqbar");


function stopPlay(){
    width=100;
    audio.pause();
    audio.currentTime = 0;
}

function listenAgain(){
    sapb(1000,"listeningqbar");
    audio.play();
}

function saveData(){

    var fd=new FormData();
          fd.append("_token","{{ csrf_token() }}");
          fd.append("responce","A");
          fd.append('type','lwfd');
	$.ajax({
        url: '/listening',
        type: 'POST',
        data: fd,
        success: function (data) {
           // alert(data);
            console.log("Server returned: ");

            document.getElementById('section').innerHTML='<div class="row justify-content-center mt-30"><h2>Test data is sent for evaluation please goto My Test area to see result..<br><a class="btn btn-success" href="/">Home</a></h2></div>';
        },
        error: function(data){
        alert(data);
    },
        cache: false,
        contentType: false,
        processData: false
    });
}
</script>
@endsection