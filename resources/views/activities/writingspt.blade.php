@extends('layouts.main')

@section('content')
<section id="section" style="min-height:400px">
<div class="container justify-content-center">
    <h4><i>You will hear a lecture. Write a summary for a fellow student who was not present at the lecture. You should write 50-70 words. You have 10 minutes to finish this task. Your response will be judged on the quality of your writing and on how well your response presents the key points presented in the lecture.</i></h4> 

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
    <textarea style="width: 80%;min-height:200px" id="txt" placeholder="Start writing here.."></textarea>
</div>

<div class="row justify-content-center" id="control">
</div>

<form id="nextQues" action="{{route('lsst')}}" method="POST">
	@csrf
<input type="number" value="{{$qno}}" name="no" hidden/>
</form>
</section>
<script>
    var cont=document.getElementById('control');
    var audio = new Audio("{{asset('assets/question')}}/{{$question}}");
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
        cont.innerHTML='<button class="btn btn-warning m-2" onclick="listenAgain()">Listen Again</button> <button class="btn btn-success m-2" onclick="saveData()">Submit & next</button>';
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
          fd.append('type','lsst');
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