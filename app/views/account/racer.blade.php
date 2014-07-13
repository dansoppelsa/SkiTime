@extends( 'layouts.master' )

@section( 'pageTitle' , 'Racer Info' )


@section( 'content' )

<div class="row">
  <h1>Racer Info</h1>

  <div class="col-sm-6">
    <h2>Info</h2>
    <ul>
      <li><strong>Name:</strong> {{ $racer->present()->fullName() }}</li>
      <li><strong>DOB:</strong> {{ $racer->dob }}</li>
      <li><strong>Home Ski Hill:</strong> {{ $racer->home_ski_hill }}</li>
    </ul>

    <h2>Races</h2>
    <ul>
      @foreach( $races as $race )
        <li><strong>{{ $race->ski_hill }}</strong> - <em>{{ $race->present()->date() }}</em></li>
      @endforeach
    </ul>
  </div>

  <div class="col-sm-4">
    <h2>Add Race</h2>

    @include( 'partials.forms._add-race-form' )
  </div>

</div>

@stop