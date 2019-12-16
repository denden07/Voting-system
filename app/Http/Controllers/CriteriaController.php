<?php

namespace App\Http\Controllers;

use App\Category;
use App\Criteria;
use App\Event;
use App\Round;
use Illuminate\Http\Request;

class CriteriaController extends Controller
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
    public function create($event_id)
    {
        //
        $event = Event::findOrFail($event_id);
        $categories = Category::pluck('name','id')->all();
        $round = Round::pluck('name','id')->all();

        return view('admin.criteria.create',compact('event','categories','round'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function inputCriteria(Request $request,$event_id)
    {
        $criteria = new Criteria();

        $criteria->name = $request->name;
        $criteria->percentage = $request->percentage;
        $criteria->category = $request->category;
        $criteria->round_id = $request->round_id;
        $criteria->event_id = $event_id;
        $criteria->type = $request->type;
        $criteria->save();

        return back()->with('success','Contestant is registered');
    }

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
}
