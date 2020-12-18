<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionPractice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function speaking(Request $request)
    {
        $question=QuestionPractice::where('type','Speaking')->where('subtype','Read Aloud')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['question'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['question'];
            $qid=$array[0]['id'];
        }
        return view('activities.speaking')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }

    public function shortanswer(Request $request)
    {
        $question=QuestionPractice::where('type','Speaking')->where('subtype','Answer Short Question')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['audio'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['audio'];
            $qid=$array[0]['id'];
        }
        return view('activities.speakingshortans')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }

    public function sentenceRepeat(Request $request)
    {
        $question=QuestionPractice::where('type','Speaking')->where('subtype','Repeat Sentence')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['audio'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['audio'];
            $qid=$array[0]['id'];
        }
        return view('activities.speakingrepeat')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }


    public function retellLecture(Request $request)
    {
        $question=QuestionPractice::where('type','Speaking')->where('subtype','Retell Lecture')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['audio'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['audio'];
            $qid=$array[0]['id'];
        }
        return view('activities.speakingrl')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }


    
    public function describeImage(Request $request)
    {

        $question=QuestionPractice::where('type','Speaking')->where('subtype','Describe Image')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['image'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['image'];
            $qid=$array[0]['id'];
        }
        return view('activities.speakingdescribeimage')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }



    //listening routes

    public function multipleChoiceSingleAnswer()
    {
        return view('activities.listeningMulSinAns');
    }
    public function writeFromDictation(Request $request)
    {

        $question=QuestionPractice::where('type','Listening')->where('subtype','Write From Dictation')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['audio'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['audio'];
            $qid=$array[0]['id'];
        }
        return view('activities.writeFromDictation')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }


    public function summerizeSpokenText(Request $request)
    {

        $question=QuestionPractice::where('type','Listening')->where('subtype','Summarize Spoken Text')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['audio'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['audio'];
            $qid=$array[0]['id'];
        }
        return view('activities.writingspt')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }


    public function fillInTheBlanks(Request $request)
    {

        $question=QuestionPractice::where('type','Listening')->where('subtype','Fill in the blanks')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $audio=$array[$qno]['audio'];
                $question=$array[$qno]['question'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $audio=$array[0]['audio'];
            $question=$array[0]['question'];
            $qid=$array[0]['id'];
        }
        return view('activities.listeningfitb')->with('question',$question)->with('qno',$qno)->with('audio',$audio)->with('qid',$qid)->with('tq',$totalq);
    }

    
    
    public function HighlightCorrectSummery(Request $request)
    {

        $question=QuestionPractice::where('type','Listening')->where('subtype','Highlight Correct Summary')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $audio=$array[$qno]['audio'];
                $a=$array[$qno]['a'];
                $b=$array[$qno]['b'];
                $c=$array[$qno]['c'];
                $d=$array[$qno]['d'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $audio=$array[0]['audio'];
                $a=$array[0]['a'];
                $b=$array[0]['b'];
                $c=$array[0]['c'];
                $d=$array[0]['d'];
            $qid=$array[0]['id'];
        }
        return view('activities.listeninghcs')
        ->with('a',$a)
        ->with('b',$b)
        ->with('c',$c)
        ->with('d',$d)
        ->with('qno',$qno)->with('audio',$audio)->with('qid',$qid)->with('tq',$totalq);
    }





    public function SelectMissingWord(Request $request)
    {

        $question=QuestionPractice::where('type','Listening')->where('subtype','Select Missing Word')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $audio=$array[$qno]['audio'];
                $a=$array[$qno]['a'];
                $b=$array[$qno]['b'];
                $c=$array[$qno]['c'];
                $d=$array[$qno]['d'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $audio=$array[0]['audio'];
                $a=$array[0]['a'];
                $b=$array[0]['b'];
                $c=$array[0]['c'];
                $d=$array[0]['d'];
            $qid=$array[0]['id'];
        }
        return view('activities.listeningsmw')
        ->with('a',$a)
        ->with('b',$b)
        ->with('c',$c)
        ->with('d',$d)
        ->with('qno',$qno)->with('audio',$audio)->with('qid',$qid)->with('tq',$totalq);
    }

    
    public function HighlightIncorrectWord(Request $request)
    {

        $question=QuestionPractice::where('type','Listening')->where('subtype','Highlight Incorrect Words')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $audio=$array[$qno]['audio'];
                $question=$array[$qno]['question'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $audio=$array[0]['audio'];
            $question=$array[0]['question'];
            $qid=$array[0]['id'];
        }
        return view('activities.listeninghiw')->with('question',$question)->with('qno',$qno)->with('audio',$audio)->with('qid',$qid)->with('tq',$totalq);
    }








    //writing section

    public function SummerizeWrittenText(Request $request)
    {

        $question=QuestionPractice::where('type','Writing')->where('subtype','Summerize Written Text')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['question'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['question'];
            $qid=$array[0]['id'];
        }
        return view('activities.writingswt')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }


    public function WrittingEssay(Request $request)
    {

        $question=QuestionPractice::where('type','Writing')->where('subtype','Essay')->get();
        $totalq=$question->count();
        $array=$question->toArray();
        if($request->isMethod('post'))
        { 
            $qno=$request->no+1;

            if(count($array)>$qno){
                $question=$array[$qno]['question'];
                $qid=$array[$qno]['id'];
            }else{
                return redirect()->back()->with('question','Please became premium member for more Questions.');
            }
            
        }else{
            $qno=0;
            $question=$array[0]['question'];
            $qid=$array[0]['id'];
        }
        return view('activities.writtinge')->with('question',$question)->with('qno',$qno)->with('qid',$qid)->with('tq',$totalq);
    }

    
    

    
    public function progress(Request $request)
    {
        return view('activities.progress')->with('head',$request->head)->with('routeurl',$request->url);
    }
}
