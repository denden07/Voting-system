<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Criteria;
use App\Event;

use App\Judge;
use App\Score;
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


    public function viewContestant($event_id)
    {

         $event = Event::findOrFail($event_id);


        $criterias =Criteria::where('event_id',$event_id)->where('round_id',1)->get();
        $criterias2 =Criteria::where('event_id',$event_id)->where('round_id',2)->get();

        $contestants = Contestant::where('event_id',$event_id)->get();
        $scoresD = array();
        foreach($contestants as $contestant) {
            $scoresD[] = Score::where('event_id', $event_id)
                ->where('contestant_id', $contestant->id)
                ->get();
        }






        $judges = Judge::where('event_id',$event_id);



            $scores = Score::where('event_id',$event_id)->get();




        return view('admin.score.index',compact('event','criterias','criterias2','contestants','scores',['scoresD'=>$scoresD]));
    }

    public function viewScore($event_id,$contestant_id)
    {



    }

}
