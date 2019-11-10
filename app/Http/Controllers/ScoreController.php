<?php

namespace App\Http\Controllers;

use App\Computed;
use App\Contestant;
use App\Criteria;
use App\Event;

use App\FinalScore;
use App\Judge;
use App\Score;
use App\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    /**
 For admin
     */

    public function showJudge($event_id){



        $event = Event::findOrFail($event_id);
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();
        $judges = Judge::where('event_id',$event_id)->get();

        return view('admin.score.show-juge',compact('event','criterias2','criterias','judges'));
    }

    public function showTotalScore($event_id){

        $event = Event::findOrFail($event_id);
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();


        $contestants = Contestant::where('event_id',$event_id)->get();

        $finalScores =FinalScore::where('event_id',$event_id)->where('round_id',1)->get();

        return view('admin.score.total-score',compact('event','criterias','criterias2','contestants','finalScores'));
    }

    public function viewContestantScore($event_id,$judge_id)
    {

         $event = Event::findOrFail($event_id);


         $judge = User::where('judge_id',$judge_id)->first();

        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();

        $contestants = Contestant::where('event_id',$event_id)->get();

        $scores =Score::where('event_id',$event_id)->where('judge_id',$judge->id)->orderBy('contestant_id','ASC')->orderBy('criteria_id','asc')->get();

        $final_scores = Computed::where('event_id',$event_id)->where('judge_id',$judge)->orderBy('contestant_id','ASC')->get();
        return view('admin.score.index',compact('event','criterias','criterias2','contestants','scores','final_scores'));
    }

    public function computeFinalScore($event_id)
    {

        $contestants = Contestant::where('event_id',$event_id)->get();
        $total_judge = User::where('event_id',$event_id)->count();


        foreach ($contestants as $contestant)
        {
          $compute =  Computed::where('contestant_id',$contestant->id)->where('round_id',1)->sum('score');

            $data = [
                'contestant_id' => $contestant->id,
                'finalScore' =>$compute/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
            ];

            FinalScore::create($data);

        }


    }

}
