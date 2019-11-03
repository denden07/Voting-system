<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Criteria;
use App\Event;

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

    public function inputScore(Request $request,$event_id){


        $contestants = Contestant::where('event_id',$event_id)->get();
        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();





        $user =Auth::user();
//        $i=1;
//        $k=1;


//        for($i=0;$i<=$contestants->count();$i++){
//            $score = new Score();
//            foreach ($contestants as $contestant){
//
//
//                $score->contestant_id = $contestant->id;
//                $score->judge_id = $user->id;
//
//
//
//            foreach ($criterias as $kid){
//            $score->score = $request->score."".$kid->id;
//            }
//
//            }
//            foreach ($criterias as $criteria)
//            {
//                $score->criteria_id = $criteria->id;
//            }
//            $score->save();
//        }
//
        $input = $request->all();

        for($i=0; $i<= count($input['score']); $i++) {

//            if(empty($input['score'][$i]) || !is_numeric($input['score'][$i])) continue;

            $data = [
                'contestant_id' => $input['contestant_id'][$i],
                'score' => $input['score'][$i], // see above for why this might be a bad idea
                'judge_id' => $user->id,
                'criteria_id'=> $input['criteria_id'][$i],
            ];


            Score::create($data);
        }



//        foreach ($contestants as $contestant){
//            $score = new Score();
//
//            $score->contestant_id = $contestant->id;
//            $score->judge_id = $user->id;
//
//            foreach ($criterias as $criteria){
//                $score->criteria_id = $criteria->id;
//            }
////
//
//
//            foreach ($criterias as $kid){
//            $score->score = $request->score."".$kid->id;
//            }
//            $score->save();
////            $i++;
//
//        }




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
