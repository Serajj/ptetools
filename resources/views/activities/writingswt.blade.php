@extends('layouts.main')

@section('content')
<section id="section" style="min-height:400px">
<div class="container justify-content-center">
    <h4><i>Read the passage below and summarize it using your own sentence. Type your response in the box at the bottom of the screen. You have 10 minutes to finish this task. You response will be judged on the quality of your writing and how well your response presents the key points in the passage.</i></h4> 
</div>
<div id="ans" class="row justify-content-center"></div>

<div class="row justify-content-center m-4">
    <p style="width: 80%;" id="question" >{{$question}}</p>
</div>

<div class="row justify-content-center">
    <textarea style="width: 80%;min-height:200px" id="txt" placeholder="Start writing here.."></textarea>
</div>


<div class="row justify-content-center" id="control">
    <button class="btn btn-success m-2" onclick="saveData()">Submit & next</button>
</div>

<form id="nextQues" action="{{route('wswt')}}" method="POST">
	@csrf
<input type="number" value="{{$qno}}" name="no" hidden/>
</form>
</section>
<script>
    document.getElementById('ans').innerHTML='<div class="row justify-content-center mt-30"><h2>Test data will send for evaluation became premium to see result.. <a class="btn btn-success" href="#">Become Premium</a></h2></div>';
    
function saveData(){
    var qid={{$qid}};
    var fd=new FormData();
    var d=document.getElementById('txt').value;
          fd.append("_token","{{ csrf_token() }}");
          fd.append("responce",d);
          fd.append('type','wswt');
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