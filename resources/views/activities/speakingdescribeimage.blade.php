@extends('layouts.main')

@section('content')
<section id="section" style="min-height:400px">
<center>
<h4><i>You will hear a question. Please give a simple and short answer. Often just once or a few words is enough.</i></h4> 

<div class="row justify-content-center">
    <div class='w3-card-4 p-1' style='width:25%; background-color: white;'> 
        <div class='w3-container'> 
            <p class='card-text'>Status : <span id='SpeakingRecStatus'>recording</span></p>
        <img src="{{asset('public/question/'.$question)}}"/>
             <div class='w3-light-grey m-2'> 
                 <div id='listeningqbar' class='w3-green' style='height:24px;width:0'>
                </div> 
            </div>
         </div>
    </div> 
         <div class='w3-card-4 p-1 m-5' id="ans" style='width:25%; background-color: white;'> 
            <h2>Record Answer</h2>
             <div class='w3-container'> 
                 <p class='card-text'>Status : <span id='SqrecStatus'>recording</span></p> 
                 <div class='w3-light-grey m-2'> 
                     <div id='sarbar' class='w3-green' style='height:24px;width:0'></div> 
                    </div> 
                    <button id='sasbtn' class='w3-button w3-ripple w3-red' disabled>Stop</button> 
                </div> 
            </div>
</div>
<button onclick="getnext()" class="btn ctabtn">Next<i class="fas fa-arrow-right" style="color:red;"></i></i></button>
<select class="btn btn-success" onchange="selectQuestion(this.value)">
		
  @for ($i = 0; $i <= $tq; $i++)
      <option value="{{ $i }}">{{ $i+1 }}</option>
      @endfor
  </select>


</center>
<form id="nextQues" action="{{route('desimage')}}" method="POST">
	@csrf
  <input type="number" id="quesno" name="no" hidden/>
</form>
</section>

<script>
//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var stopButton = document.getElementById("stopButton");
//https://picsum.photos/200/300

function startRecording() {
	console.log("recordButton clicked");

    var constraints = { audio: true, video:false }

 	/*
    	Disable the record button until we get a success or fail from getUserMedia() 
	*/

	/*
    	We're using the standard promise based getUserMedia() 
    	https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device
		*/
		audioContext = new AudioContext();

		//update the format 
		audioContext.sampleRate/1000;

		/*  assign to gumStream for later use  */
		gumStream = stream;
		
		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/* 
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input,{numChannels:1})

		//start the recording process
		rec.record()

		console.log("Recording started");

	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
    	
	});
}



function stopRecording() {
	console.log("stopButton clicked");
	
	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
	
	
	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();


  var qid={{$qid}};
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
          fd.append("_token","{{ csrf_token() }}");
          fd.append("filename",filename);
          fd.append('type','sdi');
          fd.append('qid',qid);
	$.ajax({
        url: '/save',
        type: 'POST',
        data: fd,
        success: function (data) {
           // alert(data);
            console.log("Server returned: ");

            document.getElementById('ans').innerHTML='<div class="row justify-content-center mt-30"><h2>Test data is sent for evaluation became premium to see result.. <a class="btn btn-success" href="#">Become Premium</a></h2></div>';
        },
        error: function(data){
        alert(data);
    },
        cache: false,
        contentType: false,
        processData: false
    });
    
}



function sapb(duration,id,rid,sbtnid){
    var elem = document.getElementById(id);   
    var width = 0;
    var id = setInterval(frame,duration);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        //alert("Stoped");
        sarpb(rid,sbtnid);
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }
}


sapb(1000,"listeningqbar","sarbar","sasbtn");




function sarpb(id,sbtnid){
    var elem = document.getElementById(id);   
    var btn = document.getElementById(sbtnid);
    startRecording();
    btn.disabled=false;
    var width = 0;
    var id = setInterval(frame,1000);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        stopRecording();
        
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }

    btn.addEventListener("click", ()=>{
        clearInterval(id);
    });
};


function getnext(){
		 //alert("hello");
		 document.getElementById('quesno').value={{$qno}};
        document.getElementById('nextQues').submit();
	 }


	function selectQuestion(valu){
       
        document.getElementById('quesno').value=valu;
		document.getElementById('nextQues').submit();
	}
</script>
@endsection