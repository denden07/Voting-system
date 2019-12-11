<?php

namespace App\Http\Controllers;

use App\Computed;
use App\Contestant;
use App\Criteria;
use App\Event;

use App\FinalScore;
use App\Judge;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JudgeHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('judge');
    }


    public function index()
    {
        //
            $user = Auth::user();
        $event_id = $user ->judge->event_id;


        $judge = Judge::findOrFail($user->judge_id);

        $criterias =Criteria::where('event_id',$judge->event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$judge->event_id)->where('round_id',2)->get();



        $event =Event::findOrFail($event_id);

        $contestants = Contestant::where('event_id',$judge->event_id)->get();

        return view('judge.index',compact('user','event','judge','criterias','criterias2','contestants'));

    }

    public function indexWithCriteria($criteria_id){
        $user = Auth::user();
        $event_id = $user ->judge->event_id;


        $judge = Judge::findOrFail($user->judge_id);

        $criterias =Criteria::where('event_id',$judge->event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$judge->event_id)->where('round_id',2)->get();


        $contestants = Contestant::where('event_id',$judge->event_id)->get();

        $event = Event::findOrFail($event_id);
        $criteriaSelector=Criteria::where('id',$criteria_id)->first();




        return view('judge.index2',compact('user','judge','criterias','criterias2','event','contestants','criteriaSelector'));

    }


    public function finalStage($criteria_id){
        $user = Auth::user();
        $event_id = $user ->judge->event_id;


        $judge = Judge::findOrFail($user->judge_id);

        $criterias =Criteria::where('event_id',$judge->event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$judge->event_id)->where('round_id',2)->get();


        $contestants = FinalScore::where('event_id',$judge->event_id)->where('round_id',1)->orderBy('finalScore','DESC')->take(3)->get();


        $event = Event::findOrFail($event_id);
        $criteriaSelector=Criteria::where('id',$criteria_id)->first();




        return view('judge.finals',compact('user','judge','criterias','criterias2','event','contestants','criteriaSelector'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function inputScore(Request $request,$event_id,$criteria_selector){



        $event = Event::where('id',$event_id)->first();
        $user =Auth::user();

        $input = $request->all();
        $count = count($request->input('score'));



        $criteria = Criteria::where('id',$criteria_selector)->first();
        $criteriaDevider =$criteria->percentage;




        for($i=0; $i<= $count; $i++) {

//           $score=  new Score();
//
//            $score->contestant_id = $request->contestant_id[$i];
//            $score->score = $request->score[$i]/ $criteriaDevider;
//            $score->judge_id = $user->id;
//            $score->criteria_id =$criteria->id;
//            $score->event_id = $event->id;
//            $score->save();


            if(empty($input['score'][$i]) || !is_numeric($input['score'][$i])) continue;

            $data = [
                'contestant_id' => $input['contestant_id'][$i],
                'score' => ($input['score'][$i]*$criteriaDevider)/100, // see above for why this might be a bad idea
                'judge_id' => $user->id,
                'criteria_id'=> $criteria->id,
                'event_id'=> $event->id,
            ];

            Score::create($data);


        }


        return back()->with('success','Score is passed');




    }

    public function computeScore(Request $request,$event_id){
          $contestants = Contestant::where('event_id',$event_id)->get();
        $user =Auth::user();

        foreach ($contestants as $contestant){
            $score = Score::where('contestant_id',$contestant->id)->where('judge_id',$user->id)->where('event_id',$event_id)->sum('score');
           $data = [
               'contestant_id' =>$contestant->id,
                'score' => $score,
               'round_id' => 1,
               'judge_id' => $user->id,
               'event_id' => $event_id,
           ];

           Computed::create($data);
        }
    }

    public function computeScoreFinal(Request $request,$event_id){
        $contestants = Contestant::where('event_id',$event_id)->get();
        $user =Auth::user();

        foreach ($contestants as $contestant){
            $score = Score::where('contestant_id',$contestant->id)->where('judge_id',$user->id)->where('event_id',$event_id)->where('round_id',2)->sum('score');
            $data = [
                'contestant_id' =>$contestant->id,
                'score' => $score,
                'round_id' => 2,
                'judge_id' => $user->id,
                'event_id' => $event_id,
            ];

            Computed::create($data);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
