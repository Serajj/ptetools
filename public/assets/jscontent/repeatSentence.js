function repeateSentance(){

    
    alert("Working fine");
    $('.twoouter').html(" <h4><i>You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</i></h4> <div class='w3-card-4 p-1' style='width:25%; background-color: white;'> <div class='w3-container'> <p class='card-text'>Status : <span id='SpeakingRecStatus'>recording</span></p> <div class='w3-light-grey m-2'> <div id='listeningqbar' class='w3-green' style='height:24px;width:0'></div> </div> </div> </div> <div class='w3-card-4 p-1 mt-5' style='width:25%; background-color: white;'> <h2>Record Answer</h2> <div class='w3-container'> <p class='card-text'>Status : <span id='SqrecStatus'>recording</span></p> <div class='w3-light-grey m-2'> <div id='listeningqbar' class='w3-green' style='height:24px;width:0'></div> </div> <button class='w3-button w3-ripple w3-red' disabled>Stop</button> </div> </div>");

    let pb1 = new CustomProgressBar(1000,"listeningqbar");

    pb1.move();
  }





  class CustomProgressBar{
    constructor(duration,eid) {
      this.duration = duration;
      this.eid = eid;
    }
  
    move() {

    var elem = document.getElementById(this.eid);   
    var width = 0;
    var id = setInterval(frame,this.duration);
    function frame() {
        console.log("running")
      if (width >= 100) {
        clearInterval(id);
        alert("Stoped");
      } else {
        width=width+5; 
        elem.style.width = width + '%'; 
      }
    }
  }
  
  
  }


  


  