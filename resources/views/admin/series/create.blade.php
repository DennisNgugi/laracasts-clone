@extends('layouts.app')
@section('header')
<!-- Header -->
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Create new Series</h1>

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
            <h5 class="text-center">Create series</h5>
            <br>

            <form class="row" action="{{route ('series.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-12 col-md-10">
                <!-- <div class="alert alert-success">We received your message and will contact you back soon.</div> -->

                <div class="form-group">
                  <input class="form-control form-control-lg" type="text" name="title" placeholder="Title">
                </div>

                <div class="form-group">
                  <input class="form-control form-control-lg" type="file" name="image" placeholder="">
                </div>

                <div class="form-group">
                  <textarea class="form-control form-control-lg" rows="4" placeholder="Your Description" name="description"></textarea>
                </div>

                <button class="btn btn-lg btn-block btn-primary" type="submit">Submit</button>

              </div>
            </form>
          </div>
          </div>

        </div>
      </section>

@stop
