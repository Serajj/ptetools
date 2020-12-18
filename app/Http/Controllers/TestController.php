<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Speaking;
use Auth;
use App\TestStatus;
use App\TestModel;
use App\TestQuestionModel;
use App\QuestionPractice;


class TestController extends Controller
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


     /**Speaking data store and show */



     public function index()
     {
        $testData=TestModel::get();
        return view('testview.index')->with('testData',$testData);
     }

     public function startTest(Request $request)
     {   $testData=TestModel::where('id',$request->id)->first();
        if ($testData) {
            $type=$testData->type;
            $testname=$testData->test_name;
            $testid=$request->id;
        } else {
            $type='notest';
            $testname='Sorry ! this test is expired !';
        }
        
         
        return view('testview.starttest')->with('type',$type)->with('testname',$testname)->with('tid',$testid);
     }


     public function firstQuestion(Request $request)
     {
         $testinfo=TestStatus::where('uid',Auth::user()->id)->where('tid',$request->testid)->first();
         $testData=TestModel::where('id',$request->testid)->first();
        if ($testinfo) {
           
        } else {
            $testinfo=new TestStatus();
            $testinfo->uid=Auth::user()->id;
            $testinfo->tid=$request->testid;
            $testinfo->test_time_left=$testData->duration;
            $testinfo->save();
        }
        $testinf=TestStatus::where('uid',Auth::user()->id)->where('tid',$request->testid)->first();
        $time=$testinf->test_time_left;
        $cq=$testinf->cqid;
        
        $questions=TestQuestionModel::where('tid',$request->testid)->get()->toArray();
        $question=QuestionPractice::where('id',$questions[0]['qid'])->first();
       
        if($testData->type=='CCL Trial Tests'){
            return view('testview.ccltest')->with('question',$question)->with('time',$time)->with('qcount', $questions=TestQuestionModel::where('tid',$request->testid)->count())->with('tid',$request->testid)->with('cqid',$cq+1)
            ->with('testname',$testData->test_name)->with('quesid',$questions[0]['qid']);
        }
        if($type=='Speaking Test Series'){
            return view('testview.speakingtest')->with('testData',$testData);
        }

        if($type=='Mock Test Series'){
            return view('testview.mocktest')->with('testData',$testData);
        }
        
     }
     

     





     public function speakingDataAdd(Request $request)
     {
         $uid=Auth::user()->id;

        $fileName = $request->filename.'.wav';
        $request->audio_data->move(public_path('/assets/uploadedaudio'), $fileName);
        $data=new Speaking();
        $data->uid=$uid;
        $data->data=$fileName;
        $data->note=$request->type;
        $data->question_id=$request->qid?$request->qid:"Not Filled";
        $q=$data->save();
        if($q){
            return $fileName." saved";
        }else{
            return $fileName." Not saved";
        }
        
     }



     public function listeningDataAdd(Request $request)
     {
         $uid=Auth::user()->id;

        $fileName = $request->responce;
        $data=new Speaking();
        $data->uid=$uid;
        $data->data=$fileName;
        $data->note=$request->type;
        $data->question_id=$request->qid?$request->qid:"not Filled";
        $q=$data->save();
        if($q){
            return $fileName." saved";
        }else{
            return $fileName." Not saved";
        }
        
     }
     

}
