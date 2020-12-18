@extends('layouts.main')

@section('content')


    <section id="section" style="min-height:400px">
    <center>
		<div class="row justify-content-center mt-2"><h4><i>Look at the text below. In 40 seconds, you must read this text aloud as naturally and clearly as possible. You have <span id="counsec" style="color:red"></span> seconds to read aloud.</i></h4></div>
    <div class="row justify-content-center mt-5" style="" id="controls">
  	   <button style="background: white;border:2px solid white" id="recordButton" disabled><i class="fa fa-microphone" style="font-size:40px;color:green;"></i></button>
  	   <button style="background: white;border:2px solid white;display:none" id="pauseButton" disabled><i class="fa fa-pause" style="font-size:40px;color:red;"></i></button>
       <button style="background: white;border:2px solid white" id="stopButton" disabled><i class="fa fa-stop" style="font-size:40px;color:red;"></i></button>
    
    </div>

    
        <div class="progress w-25" id="progressbar">
        </div>

          <ul style="list-style: none" id="recordingsList"></ul>
    </center>
     




    <div style="display: none" id="formats">Format: start recording to see sample rate</div>
    
    <div class="container" style="min-height: 200px;border:2px solid red">
     <p id="question"></p>
    </div>

    <div class="row justify-content-center mt-2">
		<button onclick="getnext()" class="btn ctabtn">Next<i class="fas fa-arrow-right" style="color:red;"></i></i></button>
		<select class="btn btn-success" onchange="selectQuestion(this.value)">
		
		@for ($i = 0; $i <= $tq; $i++)
        <option value="{{ $i }}">{{ $i+1 }}</option>
        @endfor
		</select>
    </div>
  	
	<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
	
<form id="nextQues" action="{{route('speaking')}}" method="POST">
	@csrf
<input type="number" id="quesno" name="no" hidden/>
</form>
    </section>



<script>


//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 
var question=document.getElementById('question');	
question.innerHTML='{{$question}}';						//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record
var reco=true;
var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");
var progressBar = document.getElementById("progressbar");


//add events to those 2 buttons
recordButton.addEventListener("click", ()=>{
    startRecording();
});
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
	console.log("recordButton clicked");
    progressBar.innerHTML='<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>'
    recordButton.innerHTML="<i class='fa fa-microphone' style='font-size:40px;color:red;'>";
	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/
    
    var constraints = { audio: true, video:false }

 	/*
    	Disable the record button until we get a success or fail from getUserMedia() 
	*/

	recordButton.disabled = false;
	stopButton.disabled = false;
	pauseButton.disabled = false

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
		document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

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
    	recordButton.disabled = false;
    	stopButton.disabled = true;
    	pauseButton.disabled = true
	});
}

function pauseRecording(){
	console.log("pauseButton clicked rec.recording=",rec.recording );
	if (rec.recording){
		//pause
		rec.stop();
        reco=false;
		pauseButton.innerHTML="<i class='fa fa-play' style='font-size:40px;color:green;'></i>";
	}else{
		//resume
		rec.record();
        reco=true;
		pauseButton.innerHTML="<i class='fa fa-pause' style='font-size:40px;color:red;'></i>";

	}
}

function stopRecording() {
    runInterval=false;
	console.log("stopButton clicked");
    progressBar.style.display="none";
	//disable the stop button, enable the record too allow for new recordings
	stopButton.disabled = true;
	recordButton.disabled = true;
	pauseButton.disabled = true;

	//reset button just in case the recording is stopped while paused
	pauseButton.innerHTML="<i class='fa fa-pause' style='font-size:40px;color:red;'></i>";
	
	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
	
	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var li = document.createElement('li');
	var link = document.createElement('a');

	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;

	//save to disk link
	link.href = url;
	link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	link.innerHTML = "Save to disk";

	//add the new audio element to li
	li.appendChild(au);
	
	//add the filename to the li
//	li.appendChild(document.createTextNode(filename+".wav "))

	//add the save to disk link to li
	//li.appendChild(link);
	
	//upload link
	var upload = document.createElement('a');
	upload.href="#";
	upload.innerHTML = "Upload";
	upload.addEventListener("click", function(event){
		  
	})
	li.appendChild(document.createTextNode (" "))//add a space in between
	//li.appendChild(upload)//add the upload link to li

	//add the li element to the ol
	recordingsList.appendChild(li);

    
	var qid={{$qid}};
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
          fd.append("_token","{{ csrf_token() }}");
		  fd.append("filename",filename);
		  fd.append('type','sra');
		  fd.append('qid',qid);
	$.ajax({
        url: '/save',
        type: 'POST',
        data: fd,
        success: function (data) {
           // alert(data);
            console.log("Server returned: ");

            question.innerHTML='<div class="row justify-content-center mt-30"><h2>Test data is sent for evaluation became premium to see result.. <a href="#">Become Premium</a></h2></div>';
        },
        error: function(data){
        //alert(data);
    },
        cache: false,
        contentType: false,
        processData: false
    });
    
}






//progressbar script

var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}



var i=0;
var c=40;
var runInterval=true;
setInterval(function(){ 


if(runInterval){
    if(i==40){
    startRecording();
    //alert("Recording Started Please Read Aloud");
}
    
    if(reco){
       i=i+1;
    }
    var d=c-i;
    if(d>0){
        document.getElementById('counsec').innerHTML=d;
    }
    else{
        document.getElementById('counsec').innerHTML=i-c;
    }
    console.log("Server returned: "+i);

    if(i==80){
       runInterval=false;
       stopRecording();
      // alert("Recording finished");
   } 
}

   
     }, 1000);

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