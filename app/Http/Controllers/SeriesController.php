<?php

namespace Dennis\Http\Controllers;

use Illuminate\Http\Request;
use Dennis\Series;
class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.series.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('admin.series.create');
    }

    /**
     * Store a newly created resource in st orage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $uploadedImage = $request->image;
        $filename = str_slug($request->title).'.'. $uploadedImage->getClientOriginalExtension();
        $image = $uploadedImage->storePubliclyAs(
          'series',$filename);

        $series = Series::create([
          'title' => $request->title,
          'slug'=> str_slug($request->title),
          'description' => $request->description,
          'image_url' => 'series/'.$filename
        ]);
        session()->flash('success','Series created succesfully');
        return redirect()->route('series.show',$series->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        //
        return view('admin.series.index')->withSeries($series);

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
