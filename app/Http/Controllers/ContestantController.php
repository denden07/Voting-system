<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Event;
use App\Photo;
use App\Sex;
use Illuminate\Http\Request;

class ContestantController extends Controller
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
        $genders = Sex::pluck('name','id')->all();


        return view('admin.contestant.create',compact('event','genders'));
    }


    public function inputContestant(Request $request,$event_id)
    {

        $contestant = new Contestant();

        $contestant->firstname = $request->firstname;
        $contestant->middlename = $request->middlename;
        $contestant->lastname = $request->lastname;
        $contestant->address = $request->address;
        $contestant->age = $request->age;
        $contestant->contactNumber = $request->contactNumber;
        $contestant->sex_id = $request->sex_id;
        $contestant->event_id = $event_id;
        $contestant->number = $request->number;

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $contestant->photo_id = $photo->id;

        }



        $photo->contestant_id = $contestant->id;
        $photo->save();
        $contestant->save();

        return back()->with('success','Contestant is registered');

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
}
