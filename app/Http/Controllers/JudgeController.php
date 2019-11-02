<?php

namespace App\Http\Controllers;

use App\Event;
use App\Judge;
use App\Photo;
use App\Sex;
use App\User;
use Illuminate\Http\Request;

class JudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.judge.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_id)
    {        //

        $event = Event::findOrFail($event_id);
        $genders = Sex::pluck('name','id')->all();

        return view('admin.judge.create',compact('event','genders'));

    }

    public function inputJudge(Request $request,$event_id){

        $judge = new Judge();

        $judge->firstname = $request->firstname;
        $judge->middlename = $request->middlename;
        $judge->lastname = $request->lastname;
        $judge->address = $request->address;
        $judge->age = $request->age;
        $judge->contactNumber = $request->contactNumber;
        $judge->email = $request->email;
        $judge->sex_id = $request->sex_id;
        $judge->event_id = $event_id;


        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $judge->photo_id = $photo->id;

        }

        $judge->save();

       $photo->judge_id = $judge->id;
       $photo->save();

       $user = new User();
       $user->name = $request->firstname . " " . $request->middlename ." ". $request->lastname;
       $user->username = $request->username;
       $user->password = bcrypt($request->password);
       $user->is_judge = 1;
       $user->photo_id = $photo->id;
       $user->judge_id = $judge->id;
       $user->email = $request->email;
        $user->save();
        return back()->with('success','Judge is registered');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$event_id)
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
