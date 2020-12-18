console.log("Recorder class added");
	
class RecordAudio{
    constructor(callback,rec) {
        this.callback = callback;
        var reco;
      }


      startRecording() {
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
            gumStream = stream;
            
            /* use the stream */
            input = audioContext.createMediaStreamSource(stream);
            var reco= new Recorder(input,{numChannels:1})
    
            reco.record();
    
            console.log("Recording started");

            return reco;
    
        }).catch(function(err) {
              //enable the record button if getUserMedia() fails
        });
    }

    stopRecording(reco) {
        console.log("stopButton clicked");
        //reset button just in case the recording is stopped while paused
        
        //tell the recorder to stop the recording
        reco.stop();
    
        //stop microphone access
        gumStream.getAudioTracks()[0].stop();
    
        //create the wav blob and pass it on to createDownloadLink
        rec.exportWAV(this.callback);
    }
    
}