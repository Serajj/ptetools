@extends('layouts.main')

@section('headcontent')

@endsection

@section('style')

   .topcontrol{
       height: 50px;
       border:2px solid red;
   }

@endsection

@section('content')
    
<div class="container-fade">
    <div class="row topcontrol">
        <div class="col-lg-1"></div>
        <div class="col-lg-8 p-1"><h3>{{$testname}} - {{ Auth::user()->name }}</h3></div>
        <div class="col-lg-3">
            <div class="container">
                <div class="row">Timing &nbsp <span id="minute"> &nbsp</span> : <span id="second"></span></div>
                <div class="row"><span id="cq"></span> &nbsp out of &nbsp<span id="tq"></span></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="main" style="height: 550px">
        <div id="testQuestion" class="container">
                
                 <section id="section" style="min-height:400px">
                 <center>
                 <h4><i>You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</i></h4> 
                 <div class='w3-card-4 p-1' style='width:25%; background-color: white;'> 
                    <div class='w3-container'>
                         <p class='card-text'>Status : <span id='SpeakingRecStatus'>Playing</span></p> 
                         <div class='w3-light-grey m-2'> 
                             <div id='listeningqbar' class='w3-green' style='height:24px;width:0'></div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class='w3-card-4 p-1 mt-5' id="ans" style='width:25%; background-color: white;'>
                         <h2>Record Answer</h2>
                          <div class='w3-container'>
                               <p class='card-text'>Status : <span id='SqrecStatus'>Recording</span></p> 
                               <div class='w3-light-grey m-2'> 
                                   <div id='sarbar' class='w3-green' style='height:24px;width:0'>
                                   </div>
                                </div>
                            </div>
                    </div>
                 </center>
                 
                 </section>
                
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3"><button class="btn btn-warning mt-1 offset-2">Pause</button></div>
        <div class="col-lg-6"></div>
        <div class="col-lg-3"><button class="btn btn-primary mt-1 offset-2" style="position: absolute;right:100px">Next</button></div>
    </div>

</div>



<script>

startProgress(1000,10);

function startProgress(duration,w){
var elem = document.getElementById('listeningqbar'); 
var width=0;

var id = setInterval(frame,duration);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        //alert('stoped');
        startRecording();
        startAnimate();
      } else {
        width=width+w; 
        elem.style.width = width + '%'; 
      }
    }

}

function startAnimate(){
    var elem = document.getElementById('sarbar'); 
    var width=0;

    var ird = setInterval(fr,1000);
    function fr() {
        console.log("running")
      if (width >= 100) {
        clearInterval(ird);
        //alert('stoped');
        stopRecording();
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }
}


var tq=document.getElementById('tq');
var cq=document.getElementById('cq');
cq.innerHTML={{$cqid}};
tq.innerHTML={{$qcount}};
var id = setInterval(timer,1000);
var i=60;
var min={{$time}}
var minute=document.getElementById('minute');
var sec=document.getElementById('second');
function timer() {
 if(i==0){
     i=60;
     min=min-1;
 }
 i--;
 sec.innerHTML=i;
 minute.innerHTML=min;
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

//recording materials




var audio = new Audio('{{asset("assets/demo/demo.wav")}}');
    audio.muted=true;
    audio.play();


//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext; //audio context to help us record




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






</script>
@endsection