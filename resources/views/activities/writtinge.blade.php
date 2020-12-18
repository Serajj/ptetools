@extends('layouts.main')

@section('content')
<section id="section" style="min-height:400px">
<div class="container justify-content-center">
    <h4><i>You will have 20 minutes to plan, write and revise an essay about the topic below. You response will be judged on how well you develop a position, organize your ideas, present supporting details, and control the elements of standard written English. You should write 200 - 300 words.</i></h4> 
</div>
<div id="ans" class="row justify-content-center"></div>

<div class="row justify-content-center m-4">
    <p style="width: 80%;" id="question" >{{$question}}</p>
</div>

<div class="row justify-content-center">
    <textarea style="width: 80%;min-height:400px" id="txt" placeholder="Start writing here.."></textarea>
</div>


<div class="row justify-content-center" id="control">
    <button class="btn btn-success m-2" onclick="saveData()">Submit & next</button>
</div>

<form id="nextQues" action="{{route('we')}}" method="POST">
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
          fd.append('type','we');
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