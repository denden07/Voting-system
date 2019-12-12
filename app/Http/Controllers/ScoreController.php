<?php

namespace App\Http\Controllers;

use App\Award;
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


    public function showJudgeFinal($event_id){



        $event = Event::findOrFail($event_id);
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();
        $judges = Judge::where('event_id',$event_id)->get();

        return view('admin.score.show-judge-final',compact('event','criterias2','criterias','judges'));
    }

    public function showTotalScore($event_id){

        $event = Event::findOrFail($event_id);
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();


        $contestants = Contestant::where('event_id',$event_id)->get();



        $finalScores =FinalScore::where('event_id',$event_id)->where('sex_id',2)->where('round_id',1)->get();
        $finalScores2 =FinalScore::where('event_id',$event_id)->where('sex_id',1)->where('round_id',1)->get();



        return view('admin.score.total-score',compact('event','criterias','criterias2','contestants','finalScores','finalScores2'));
    }

    public function showTotalScoreAwards($event_id){

        $event = Event::findOrFail($event_id);
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();


        $contestants = Contestant::where('event_id',$event_id)->get();



        $finalScores =FinalScore::where('event_id',$event_id)->where('sex_id',2)->where('round_id',1)->get();
        $finalScores2 =FinalScore::where('event_id',$event_id)->where('sex_id',1)->where('round_id',1)->get();

        $productionNOs = Award::where('criteria_id',9)->where('sex_id',2)->where('round_id',1)->where('event_id',$event_id)->get();
        $productionNOs2 = Award::where('criteria_id',9)->where('sex_id',1)->where('round_id',1)->where('event_id',$event_id)->get();



        return view('admin.score.awards',compact('event','criterias','criterias2','contestants','finalScores','finalScores2','productionNOs','productionNOs2'));
    }



    public function showTotalScoreFinal($event_id){

        $event = Event::findOrFail($event_id);
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();


        $contestants = Contestant::where('event_id',$event_id)->get();

        $finalScores =FinalScore::where('event_id',$event_id)->where('round_id',2)->get();


        return view('admin.score.total-score-final',compact('event','criterias','criterias2','contestants','finalScores'));
    }


    public function viewContestantScore($event_id,$judge_id)
    {

         $event = Event::findOrFail($event_id);
         $judge = User::where('judge_id',$judge_id)->first();
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();
        $contestants = Contestant::where('event_id',$event_id)->where('sex_id',2)->get();


        $r =Score::where('event_id',$event_id)->where('judge_id',$judge->id)->orderBy('contestant_id','ASC')->orderBy('criteria_id','asc')->get();
        $scores =Score::where('event_id',$event_id)->where('sex_id',2)->where('round_id',1)->where('judge_id',$judge->id)->get();








        return view('admin.score.index',compact('event','criterias','criterias2','contestants','scores'));
    }


    public function viewContestantScoreFinal($event_id,$judge_id)
    {

        $event = Event::findOrFail($event_id);


        $judge = User::where('judge_id',$judge_id)->first();

        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();




        $contestants = Contestant::where('event_id',$event_id)->get();


        $scores =Score::where('event_id',$event_id)->where('judge_id',$judge->id)->orderBy('contestant_id','ASC')->orderBy('criteria_id','asc')->get();

        $final_scores = Computed::where('event_id',$event_id)->where('judge_id',$judge)->orderBy('contestant_id','ASC')->get();
        return view('admin.score.index2',compact('event','criterias','criterias2','contestants','scores','final_scores'));
    }


    public function computeFinalScore($event_id)
    {


        $total_judge = User::where('event_id',$event_id)->count();

        $contestants = Contestant::where('event_id',$event_id)->where('sex_id',2)->get();
        foreach ($contestants as $contestant)
        {
          $compute =  Computed::where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',1)->sum('score');

            $data = [
                'contestant_id' => $contestant->id,
                'finalScore' =>$compute/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>2,
            ];

            FinalScore::create($data);

        }

        $contestants2 = Contestant::where('event_id',$event_id)->where('sex_id',1)->get();
        foreach ($contestants2 as $contestant2)
        {
            $compute2 =  Computed::where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',1)->sum('score');

            $data2 = [
                'contestant_id' => $contestant2->id,
                'finalScore' =>$compute2/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>1,
            ];

            FinalScore::create($data2);

        }



    }




    public function computeFinalScoreFinal($event_id)
    {


        $total_judge = User::where('event_id',$event_id)->count();

        $contestants = Contestant::where('event_id',$event_id)->where('sex_id',2)->get();
        foreach ($contestants as $contestant)
        {
            $compute =  Computed::where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',2)->sum('score');

            $data = [
                'contestant_id' => $contestant->id,
                'finalScore' =>$compute/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 2,
                'sex_id'=>2,
            ];

            FinalScore::create($data);

        }

        $contestants2 = Contestant::where('event_id',$event_id)->where('sex_id',1)->get();
        foreach ($contestants2 as $contestant2)
        {
            $compute2 =  Computed::where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',2)->sum('score');

            $data2 = [
                'contestant_id' => $contestant2->id,
                'finalScore' =>$compute2/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 2,
                'sex_id'=>1,
            ];

            FinalScore::create($data2);

        }


    }

    public function computeAwards($event_id){

        $total_judge = User::where('event_id',$event_id)->count();
        $contestants = Contestant::where('event_id',$event_id)->where('sex_id',2)->get();
        $contestants2 = Contestant::where('event_id',$event_id)->where('sex_id',1)->get();

        foreach ($contestants as $contestant)
        {
            $compute3 =  Score::where('criteria_id',9)->where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',1)->sum('score');

            $data3 = [
                'contestant_id' => $contestant->id,
                'score'=>$compute3/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>2,
                'criteria_id'=>9
            ];

            Award::create($data3);

        }

        foreach ($contestants2 as $contestant2)
        {
            $compute4 =  Score::where('criteria_id',9)->where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',1)->sum('score');

            $data4 = [
                'contestant_id' => $contestant2->id,
                'score'=>$compute4/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>1,
                'criteria_id'=>9
            ];

            Award::create($data4);

        }


        foreach ($contestants as $contestant)
        {
            $compute5 =  Score::where('criteria_id',10)->where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',1)->sum('score');

            $data5 = [
                'contestant_id' => $contestant->id,
                'score'=>$compute5/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>2,
                'criteria_id'=>10
            ];

            Award::create($data5);

        }

        foreach ($contestants2 as $contestant2)
        {
            $compute6 =  Score::where('criteria_id',10)->where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',1)->sum('score');

            $data6 = [
                'contestant_id' => $contestant2->id,
                'score'=>$compute6/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>1,
                'criteria_id'=>10
            ];

            Award::create($data6);

        }

        foreach ($contestants as $contestant)
        {
            $compute7 =  Score::where('criteria_id',11)->where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',1)->sum('score');

            $data7 = [
                'contestant_id' => $contestant->id,
                'score'=>$compute7/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>2,
                'criteria_id'=>11
            ];

            Award::create($data7);

        }

        foreach ($contestants2 as $contestant2)
        {
            $compute8 =  Score::where('criteria_id',11)->where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',1)->sum('score');

            $data8 = [
                'contestant_id' => $contestant2->id,
                'score'=>$compute8/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>1,
                'criteria_id'=>11
            ];

            Award::create($data8);

        }

        foreach ($contestants as $contestant)
        {
            $compute9 =  Score::where('criteria_id',12)->where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',1)->sum('score');

            $data9 = [
                'contestant_id' => $contestant->id,
                'score'=>$compute9/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>2,
                'criteria_id'=>12
            ];

            Award::create($data9);

        }

        foreach ($contestants2 as $contestant2)
        {
            $compute10 =  Score::where('criteria_id',12)->where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',1)->sum('score');

            $data10 = [
                'contestant_id' => $contestant2->id,
                'score'=>$compute10/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>1,
                'criteria_id'=>12
            ];

            Award::create($data10);

        }

        foreach ($contestants as $contestant)
        {
            $compute11 =  Score::where('criteria_id',14)->where('contestant_id',$contestant->id)->where('sex_id',2)->where('round_id',1)->sum('score');

            $data11 = [
                'contestant_id' => $contestant->id,
                'score'=>$compute11/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>2,
                'criteria_id'=>14
            ];

            Award::create($data11);

        }

        foreach ($contestants2 as $contestant2)
        {
            $compute12 =  Score::where('criteria_id',14)->where('contestant_id',$contestant2->id)->where('sex_id',1)->where('round_id',1)->sum('score');

            $data12 = [
                'contestant_id' => $contestant2->id,
                'score'=>$compute12/$total_judge,
                'event_id'=>$event_id,
                'round_id' => 1,
                'sex_id'=>1,
                'criteria_id'=>14
            ];

            Award::create($data12);

        }



    }


}
