<?php

namespace Dennis\Http\Controllers;
use Dennis\Series;
use Dennis\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
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
    public function store(Series $series,Request $request)
    {
        //
        return $series->lessons()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Dennis\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Dennis\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Dennis\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series, Lesson $lesson)
    {
        //
        $lesson->update($request->all());

        return $lesson->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Dennis\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series,Lesson $lesson)
    {
        //
         $lesson->delete();

         return response()->json(['status'=> 'ok'],200);
    }
}
