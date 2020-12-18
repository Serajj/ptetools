function answerShortQuestion(){
    alert("Answer shor question");

    $('.twoouter').html(" <h4><i>You will hear a question. Please give a simple and short answer. Often just once or a few words is enough.</i></h4> <div class='w3-card-4 p-1' style='width:25%; background-color: white;'> <div class='w3-container'> <p class='card-text'>Status : <span id='SpeakingRecStatus'>recording</span></p> <div class='w3-light-grey m-2'> <div id='listeningqbar' class='w3-green' style='height:24px;width:0'></div> </div> </div> </div> <div class='w3-card-4 p-1 mt-5' style='width:25%; background-color: white;'> <h2>Record Answer</h2> <div class='w3-container'> <p class='card-text'>Status : <span id='SqrecStatus'>recording</span></p> <div class='w3-light-grey m-2'> <div id='sarbar' class='w3-green' style='height:24px;width:0'></div> </div> <button id='sasbtn' class='w3-button w3-ripple w3-red' disabled>Stop</button> </div> </div>");
   // let pb1 = new CustomProgressBarShortAnswer(1000,"listeningqbar");
  sapb(1000,"listeningqbar","sarbar","sasbtn");
   // pb1.move();
}


var gumStreamSaq; 						//stream from getUserMedia()
var recSaq; 							//Recorder.js object
var inputSaq; 

function sapb(duration,id,rid,sbtnid){
    var elem = document.getElementById(id);   
    var width = 0;
    var id = setInterval(frame,duration);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        alert("Stoped");
        sarpb(rid,sbtnid);
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }
}

function createDownloadLinkSaQ(blob) {   
    var filenametemp = new Date().toISOString()+"hi"; 


    console.log((blob!=null)+filenametemp);
    var fd=new FormData();
    fd.append("audio_data",blob, filenametemp);
    fd.append("_token","{{ csrf_token() }}");
    fd.append("filename",filenametemp);
$.ajax({
  url: '/speaking',
  type: 'POST',
  data: fd,
  success: function (data) {
     // alert(data);
      console.log("Server returned: ");
      $('.twoouter').html('<div class="row justify-content-center mt-30"><h2>Test data is sent for evaluation please goto My Test area to see result..</h2></div>');
  },
  error: function(data){
  alert(data);
},
  cache: false,
  contentType: false,
  processData: false
});

}


function sarpb(id,sbtnid){
    var elem = document.getElementById(id);   
    var btn = document.getElementById(sbtnid);
    startRecordingSaq();
    btn.disabled=false;
    var width = 0;
    var id = setInterval(frame,1000);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        stopRecordingSaq();
        
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }

    btn.addEventListener("click", ()=>{
        clearInterval(id);
    });
};


function startRecordingSaq() {
	console.log("recordButton clicked");
    
    var constraints = { audio: true, video:false }

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
		gumStreamSaq = stream;
		
		/* use the stream */
		inputSaq = audioContext.createMediaStreamSource(stream);
		recSaq = new Recorder(inputSaq,{numChannels:1})

		recSaq.record()

		console.log("Recording started");

	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
	});
}


function stopRecordingSaq() {
	console.log("stopButton clicked");
	//reset button just in case the recording is stopped while paused
	
	//tell the recorder to stop the recording
	recSaq.stop();

	//stop microphone access
	gumStreamSaq.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	recSaq.exportWAV(createDownloadLinkSaQ);
}





