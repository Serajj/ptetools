@extends('layouts.main')

@section('content')
<section id="section" style="min-height:400px">
<div class="container justify-content-center">
    <h4><i>You will hear a recording. Below is a transcription of the recording. Some words in the transcription differ from what the speaker(s) said. Please write below the words that are different.</i></h4> 

    <div class="row justify-content-center m-5">
        <div class='w3-card-4 p-1' style='width:25%; background-color: white;'> 
            <div class='w3-container'> 
                <p class='card-text'>Status : <span id='SpeakingRecStatus'>Playing</span></p>
                <audio></audio>
                 <div class='w3-light-grey m-2'> 
                     <div id='listeningqbar' class='w3-green' style='height:24px;width:0'>
                    </div> 
                </div>
             </div>
        </div> 
</div>


</div>
<div id="ans" class="row justify-content-center"></div>

<div class="row justify-content-center m-4">
    <p style="width: 80%;min-height:200px;border:2px solid black;" id="question" ></p>
</div>

<div class="row justify-content-center">
    <label for="text" class="form-label">Write Incorrect Words below</label>
    <input type="text" id="txt" class="form-control md-6 sm-6 m-5"  placeholder="Start writing incorrect words here seperate by (,)">
</div>

<div class="row justify-content-center" id="control">
</div>

<form id="nextQues" action="{{route('lhiw')}}" method="POST">
	@csrf
<input type="number" value="{{$qno}}" name="no" hidden/>
</form>
</section>
<script>
    var cont=document.getElementById('control');
    var question=document.getElementById('question');
    question.innerHTML='{{$question}}';
    var audio = new Audio('{{asset('assets/question')}}/{{$audio}}');
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
        cont.innerHTML='<button class="btn btn-warning m-2" onclick="listenAgain()">Listen Again</button> <button class="btn btn-success m-2" onclick="saveData()">Submit & next</button><select style="height:40px" class="btn btn-success" onchange="selectQuestion(this.value)">@for ($i = 0; $i <= $tq; $i++)<option value="{{ $i }}">{{ $i+1 }}</option>@endfor</select>';
        document.getElementById('ans').innerHTML='<div class="row justify-content-center mt-30"><h2>Test data is sent for evaluation became premium to see result.. <a class="btn btn-success" href="#">Become Premium</a></h2></div>';
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
    var qid={{$qid}};
    var fd=new FormData();
    var d=document.getElementById('txt').value;
          fd.append("_token","{{ csrf_token() }}");
          fd.append("responce",d);
          fd.append('type','lhiw');
          fd.append('qid',qid);
	$.ajax({
        url: '/listening',
        type: 'POST',
        data: fd,
        success: function (data) {
           // alert(data);
            console.log("Server returned: ");
            document.getElementById('nextQues').submit();
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