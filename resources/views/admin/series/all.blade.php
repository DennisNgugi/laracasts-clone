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

            <table class="table">
              <thead>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
              <tbody>
                @forelse($series as $s)
                <tr>
                  <td>{{$s->title}}</td>
                  <td>
                    <a href="{{route('series.edit',$s->slug)}}" class="btn btn-info">Edit</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @empty
                <p class="text-center">No series yet</p>

                @endforelse
              </tbody>
            </table>
          </div>
          </div>

        </div>
      </section>

@stop
