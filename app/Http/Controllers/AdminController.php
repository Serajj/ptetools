<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\QuestionPractice;
use App\User;
use App\TestQuestionModel;
use App\TestModel;
use Illuminate\Support\Facades\Hash;
use App\Speaking;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $tuser=User::where('type','!=','admin')->get()->count();
        $puser=User::where('type','!=','admin')->where('type','Premium')->get()->count();
        return view('admin.dashboard')->with('tu',$tuser)->with('pu',$puser);
    }

    public function users(Request $request)
    {
        $user=User::where('type','!=','admin')->get();
        return view('admin.user.index')->with('userList',$user);
    }

    public function premiumusers(Request $request)
    {
        $user=User::where('type','Premium')->get();
        return view('admin.user.index')->with('userList',$user);
    }

    public function adduserview(Request $request)
    {
        return view('admin.user.add');
    }

    public function adduserpost(Request $request)
    {
        $user=new User();
        $user->name=$request->name?$request->name:"No Filled";
        $user->email=$request->email?$request->email:"No Filled";
        $user->phone=$request->phone?$request->phone:"No Filled";
        $user->photo=$request->photo?$request->photo:"No Filled";
        $user->password=$request->password?Hash::make($request->password):"No Filled";
        $user->	email_verified_at="2020-11-11 11:48:23";
        $user->type=$request->type?$request->type:"No Filled";
        $user->save();

        $user=User::where('type','!=','admin')->get();
        return view('admin.user.index')->with('userList',$user);
    }


    public function questions(Request $request)
    {
        $question=QuestionPractice::get();
        $testData=TestModel::get();
        return view('admin.question.index')->with('questionList',$question)->with('testData',$testData);
    }

    public function addquestionview(Request $request)
    {
        return view('admin.question.add');
    }

    public function addquestionpost(Request $request)
    {
        $question=new QuestionPractice();
        $question->type=$request->type?$request->type:"No Filled";
        $question->subtype=$request->subtype?$request->subtype:"No Filled";
        $question->question=$request->question?$request->question:"No Filled";
        $question->message=$request->addinfo?$request->addinfo:"No Filled";
        $question->data=$request->data?$request->data:"No Filled";
        $question->a=$request->a?$request->a:"No Filled";
        $question->b=$request->b?$request->b:"No Filled";
        $question->c=$request->c?$request->c:"No Filled";
        $question->d=$request->d?$request->d:"No Filled";
        $question->correct=$request->correct?$request->correct:"No Filled";
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/question');
            $image->move($destinationPath, $name);
            $question->image=$name;
        }
        if ($request->hasFile('audio')) {
            $data = $request->file('audio');
            $audio = time().'.'.$data->getClientOriginalExtension();
            $destinationPath = public_path('/assets/question');
            $data->move($destinationPath, $audio);
            $question->audio=$audio;
        }
        $question->save();

        $question=QuestionPractice::get();
        return view('admin.question.index')->with('questionList',$question);
    }


    public function questionDelete(Request $request)
    {
        $question=QuestionPractice::where('id',$request->id)->first();
        $question->delete();

        return redirect()->route('admin.questions');
    }


    public function Evolution(Request $request)
    {
        $testDataList=Speaking::where('checkedby',null)->get();
        foreach($testDataList as $test){
            $user=User::where('id',$test->uid)->first();
            $question=QuestionPractice::where('id',$test->question_id)->first();
            if($user){
                $test->name=$user->name;
                $test->email=$user->email;
                $test->member=$user->type;
               

            }else{
                $test->name="User not exist";
                $test->email="User not exist";
                $test->member="User not exist";

        }
        if($question){
            
            $test->type=$question->type;
            $test->subtype=$question->subtype;

        }else{
            $test->type="Question not exist";
            $test->subtype="Question not exist";
        }
    }
        return view('admin.evoluate.index')->with('testDataList',$testDataList);
    }
    


    public function Evoluate(Request $request)
    {
        $test=Speaking::where('id',$request->id)->first();
        $question=QuestionPractice::where('id',$test->question_id)->first();
        
        return view('admin.evoluate.edit')->with('userdata',$test)->with('question',$question);
    }




    public function showTest(Request $request)
    {
        $question=TestModel::get();
        
        return view('admin.usertest.index')->with('testList',$question);
    }

    
    public function addalltestview(Request $request)
        {
            return view('admin.usertest.add');
        }


        public function addalltestpost(Request $request)
        {
            $test=new TestModel();
            $test->test_name=$request->name;
            $test->type=$request->type;
            $test->duration=$request->duration;
             $test->save();
             return redirect()->route('admin.atest');
        }

        public function  alltestDelete(Request $request)
        {
            $test=TestModel::where('id',$request->id)->first();
            
             $test->delete();
             return redirect()->back();
        }

        public function questionAddTotest(Request $request)
        { $question=QuestionPractice::where('id',$request->qid)->first();
            $test=TestQuestionModel::where('tid',$request->testId)->where('qid',$request->qid)->first();
            if($test){
                 return redirect()->back();
            }else{
                $add=new TestQuestionModel();
                $add->tid=$request->testId;
                $add->qid=$request->qid;
                $add->type=$question->type;
                $add->subtype=$question->subtype;
                $add->save();
                return redirect()->route('admin.questions');
            }
           // echo $request->qid;
            //echo $request->testId;
            
           
        }
        
}