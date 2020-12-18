<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#ff4a3d" />
    <title>PTE</title>
    <link rel="stylesheet" href="{{asset('user_assets/css/style.css')}}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="{{asset('user_assets/js/main.js')}}"></script>
    <script src="{{asset('assets/jscontent/repeatSentence.js')}}"></script>
    <script src="{{asset('assets/jscontent/answerShortQuestion.js')}}"></script>  
    <script src="{{asset('assets/jscontent/recordaudio.js')}}"></script>  
    @yield('headcontent') 
<style>


@yield('style')




 .dropdown-toggle::after { 
            content: none; 

        } 
        .dropdown-menu {

 padding: 0px;
 border-radius: 10px;
}
.nav-item{
margin: 0 18px;

}
.nav-link{
	color: red;
}
.dropdown-menu a{
	color: black;
	height: 8vh;
	display: flex;
	
	align-items: center;
}
.dropdown-menu a:hover{
	background-color: rgb(216,63,36);
	border-radius: 10px;
	color: white;
	transition: 0.8s;
}
.twoouter{

        background-color:rgb(240,240,240);height: 90vh;width: 100%;
        display: none;
        flex-direction: column;
        text-align: center;
        align-items: center;
        justify-content: center;
        
        box-sizing: border-box;
        
      }
#headingouter h2{
        
        margin-bottom: 10%;
        

      }
      #buttonouter{
      	height: 10vh;
      	width: 25%;
      }
     #buttonouter button{
        height: 10vh;
        width: 100%;
        background-color: rgb(216,63,36);
        color: white;
        border-radius: 20px;
      }
</style>
    <style>
      span.sprint1 {
        background: red;
        color: white;
        clear: both;
        width: 900px;
        padding: 5px 15px 5px 15px;
        font-size: 13px;
        margin: 0 auto;
        border-radius: 10px;
      }

      span.sprint3 {
        background: red;
        /* width: 100px !important; */
        /* background-color: #ebebeb; */
        color: white;
        clear: both;
        width: 900px;
        padding: 5px 61px 5px 61px;
        margin: 0 auto;
      }

      span.sprint111 {
        background: green;
        color: white;
        clear: both;
        width: 900px;
        padding: 5px 15px 5px 15px;
        font-size: 13px;
        margin: 0 auto;
        border-radius: 10px;
      }
      .plus-sign {
        display: inline;
        /* display: inline-block; */
      }
    </style>
  </head>

    <script type="text/javascript">
$(document).ready(function(){
$('.dropdown-menu a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
})
      </script>
  <body>
    
    <nav class="navbar navbar-expand-md navbar-dark bg-red">
  <div class="hdr-left logo-wrap">
            <a href="/">
              <h3 class="brdr-hdng hdrlogo m-0">Site-Logo</h3>
            </a>
          </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04" style="margin-left:10%;">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Speaking</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
        <a class="dropdown-item" href="{{url('progress/speaking/speaking')}}" id="creadaloud">Read Aloud</a>
          <a class="dropdown-item" href="{{url('progress/Repeat Sentence/srs')}}" id="repeatsentence">Repeat Sentence</a>
          <a class="dropdown-item" href="{{url('progress/Describe Image/desimage')}}" id="describeimage">Describe Image</a>
          <a class="dropdown-item" href="{{url('progress/Retell Lecture/srl')}}" id="retelllecture">Retell Lecture</a>
          <a class="dropdown-item" href="{{url('progress/Short Answer/shortanswer')}}" id="answershort">Answer Short Question</a>
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Writing</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="{{url('progress/Summarize Written Text/wswt')}}" id="rsummarize">Summarize Written Text</a>
          <a class="dropdown-item" href="{{url('progress/Essay/we')}}" id="ressay">Essay</a>
          
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reading</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="#" id="rreading">Reading & Writing Fill in the blanks</a>
          <a class="dropdown-item" href="#" id="rmultiple">Multiple Choice, Multiple Answer</a>
          <a class="dropdown-item" href="#" id="rreorder">Re-order Paragraph</a>
          <a class="dropdown-item" href="#" id="rfill">Fill in the blanks (Drag and Drop)</a>
          <a class="dropdown-item" href="" id="rmultiplesingle">Multiple Choice, Single Answer</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listining</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="{{url('progress/Summarize Spoken Text/lsst')}}" id="lsummarize">Summarize Spoken Text</a>
          <a class="dropdown-item" href="#" id="lmultiple">Multiple Choice, Multiple Answer</a>
          <a class="dropdown-item" href="{{url('progress/Fill in the blanks/lfitb')}}" id="lfill">Fill in the blanks</a>
          <a class="dropdown-item" href="{{url('progress/Highlight Correct Summary/lhcs')}}" id="lhighlight">Highlight Correct Summary</a>
          <a class="dropdown-item" href="{{url('progress/Multiple Choice Single Answer/lmcsa')}}" id="lmultiplesingle">Multiple Choice, Single Answer</a>
          <a class="dropdown-item" href="{{url('progress/Select Missing Word/lsmw')}}" id="lselect">Select Missing Word</a>
         
          <a class="dropdown-item" href="{{url('progress/Highlight Incorrect Words/lhiw')}}" id="lhigh">Highlight Incorrect Words</a>
          <a class="dropdown-item" href="{{url('progress/Dictation Writing/wfd')}}" id="lwrite">Write From Dictation</a>
        </div>
      </li>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Test</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="{{url('test')}}">Practise Tests</a>
     
        </div>
      </li>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Study</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="#">Dictation</a>
          
        </div>
      </li>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="#">Action</a>
       
        </div>
      </li>
    </ul>
    <!-- login start -->

<li>
                  <!-- Login button section start-->
                  <div class="cta-wrapper" style="margin-top: -15px;">

                    @guest
                            <!-- Button trigger modal -->
                    <button type="button" class="btn ctabtn" data-toggle="modal" data-target="#contactform">
                        Login
                        <span class="ico"
                          ><i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                      </button>
                        @else
                           <ul style="list-style: none">
                            <li class="nav-item dropdown">
                                <a style="color:white " id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                           </ul>
                        @endguest


                    

                    <!-- Modal -->
                    <div
                      class="modal fade cus_bgbg"
                      id="contactform"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="contactfromTitle"
                      aria-hidden="true"
                    >
                      <div
                        class="modal-dialog modal-dialog-centered modal-lg"
                        role="document"
                      >
                        <div class="modal-content">
                          <div class="modal-body row">
                            <div
                              class="col-md-6 bg-red white text-center cus_padd"
                            >
                              <div
                                class="d-flex flex-wrap h-100 align-items-center"
                              >
                                <h3 class="ctchdng font-italic">
                                  Let’s work together to define and engage your
                                  <span class="sitename sprinthdng"
                                    >Company Name</span
                                  >
                                </h3>
                                <h3 class="ctchdng font-italic cus_hdng_ctc">
                                  First, tell us a little more about yourself,
                                  your company/project and your Creative Design
                                  ideas.
                                </h3>
                              </div>
                            </div>
                            <div class="col-md-6 cus_paddtwo">
                              <form class="ctcfrm" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="sprint2">&nbsp;&nbsp;</div>

                                <h6 class="rqsthdng bold black">Login</h6>

                                <div class="form-group">
                                  <!-- <label for="inputemail"></label> -->
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <div
                                    class="custom-control custom-checkbox mb-3"
                                  >
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label
                                      class="custom-control-label cus_size"
                                      for="authorize"
                                      >Remember Me</label
                                    >
                                  </div>
                                </div>

                                <button type="submit" class="btn sendbtn white">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn sendbtn white"  href="{{ route('login.google') }}"">Google</a>

                                <a class="btn sendbtn white mt-2"  href="{{ route('login.facebook') }}"">Facebook</a>

                                <a class="btn sendbtn white mt-2"  href="{{ route('register') }}"">Sign Up</a>


                                <br />
                                <span id="resultt"> </span>
                              </form>
                              
                              
                              <div class="divider mx-auto my-3 bg-red"></div>
                              <span class="hinthdng font-weight-bold"
                                >Or simply contact us:</span
                              >
                              <div class="contact-detail-wrapper ml-5">
                                <span
                                  class="sprinthdng regular mt-3 d-inline-block font-weight-bold"
                                  >Address , Flat Number</span
                                >
                                <div class="detail-wrapper">
                                  <div class="phone-wrapper">
                                    <a class="sitecolor" href="tel:+123 123 123"
                                      >Mobile +123 123 123</a
                                    >
                                  </div>
                                  <div class="email-wrapper">
                                    <a
                                      class="sitecolor"
                                      href="mailto:mail@yourcompany.com"
                                      >mail@yourcompany.com</a
                                    >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
   </li>
    <!--login end-->
  </div>
</nav>

<!--nav end-->

@yield('content')


  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      offset: 150,
      delay: 200,
      once: false,
      disable: "mobile",
      startEvent: "load",
    });
  </script>
  <script>
    $(".counter").counterUp({
      time: 3000,
    });
  </script>
  <script type="text/javascript">
      const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {

if (this.matchMedia("(min-width: 768px)").matches) {
  $dropdown.hover(
    function() {
      const $this = $(this);
      $this.addClass(showClass);
      $this.find($dropdownToggle).attr("aria-expanded", "true");
      $this.find($dropdownMenu).addClass(showClass);
    },
    function() {
      const $this = $(this);
      $this.removeClass(showClass);
      $this.find($dropdownToggle).attr("aria-expanded", "false");
      $this.find($dropdownMenu).removeClass(showClass);
    }
  );
} else {
  $dropdown.off("mouseenter mouseleave");
}
});
  </script>
  <script type="text/javascript">
      
      $(document).ready(function(){



$('#repeatsentence').click(function(){
   //$('#headingouter').html("<h2>Your Speaking - Repeat Sentance Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
  // $('#buttonouter').html("<button onclick='repeateSentance();'>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});


$('#describeimage').click(function(){
 //  $('#headingouter').html("<h2>Your Speaking - Describe Image Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
  // $('#buttonouter').html("<button>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});

$('#retelllecture').click(function(){
   //$('#headingouter').html("<h2>Your Speaking - Retell Lecture Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
  //// $('#buttonouter').html("<button>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});


$('#answershort').click(function(){
 //  $('#headingouter').html("<h2>Your Speaking - Answer Short Question Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
 //  $('#buttonouter').html("<button onclick='answerShortQuestion();'>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});
$('#rsummarize').click(function(){
   $('#headingouter').html("<h2>Your Writing - Sumarize Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
 $('#ressay').click(function(){
   $('#headingouter').html("<h2>Your Writing - Essay Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
  $('#rreading').click(function(){
   $('#headingouter').html("<h2>Your Reading - Reading Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
   $('#rmultiple').click(function(){
   $('#headingouter').html("<h2>Your Reading - Multiple Question Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
    $('#rreorder').click(function(){
   $('#headingouter').html("<h2>Your Reading - RE-Order  Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
  $('#rfill').click(function(){
   $('#headingouter').html("<h2>Your Reading - Fill in the blanks  Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
      $('#rmultiplesingle').click(function(){
  // $('#headingouter').html("<h2>Your Reading - Multiple choice single question Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
  // $('#buttonouter').html("<button>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});
        $('#lsummarize').click(function(){
  // $('#headingouter').html("<h2>Your Listining - Summarize Spoken Text Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
  // $('#buttonouter').html("<button>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});
  
    $('#lmultiple').click(function(){
   $('#headingouter').html("<h2>Your Listining - Multiple choice, Multiple Answer Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
  $('#lfill').click(function(){
   $('#headingouter').html("<h2>Your Listining - Fill in the blanks Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
  $('#lhighlight').click(function(){
   $('#headingouter').html("<h2>Your Listining - Heighlight Corerct Summary Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
  $('#lmultiplesingle').click(function(){
   //$('#headingouter').html("<h2>Your Listining - Multiple choice single Answer Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
  // $('#buttonouter').html("<button>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});
  $('#lselect').click(function(){
   $('#headingouter').html("<h2>Your Listining - Select Missing Word Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
     $('#lhigh').click(function(){
   $('#headingouter').html("<h2>Your Listining - Heighlight incorrect words Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
   $('#buttonouter').html("<button>Start practiing</button> ");
$('#allmenucollection').hide();
$('.twoouter').show().css("display","flex");
});
 $('#lwrite').click(function(){
 //  $('#headingouter').html("<h2>Your Listining - Dictation Practising Progress</h2>").css({"margin-top": "0%", "margin-bottom": "5%"});
 //  $('#buttonouter').html("<button>Start practiing</button> ");
//$('#allmenucollection').hide();
//$('.twoouter').show().css("display","flex");
});
  



      });
  </script>
  <script type="text/javascript">

function myFunction() {
   
}




</script>


</body>
</html>