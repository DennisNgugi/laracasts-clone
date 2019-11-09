@extends('layouts.app')
@section('header')
<!-- Header -->
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>{{$series->title}}</h1>
        <p class="fs-20 opacity-70">Customize your series lesson.</p>

      </div>
    </div>

  </div>
</header>
<!-- END Header -->
@stop
@section('content')


<div class="container">

        <div class="row gap y">
          <div class="col-md-12">
            <h5 class="text-center my-4">Create series</h5>
            <br>
            <vue-lessons default_lessons="{{$series->lessons}}" series_id="{{$series->id}}"></vue-lessons>
          </div>


        </div>


</div>

@stop
