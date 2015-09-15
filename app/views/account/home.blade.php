@extends( 'layouts.master' )

@section( 'pageTitle' , 'Account Home' )


@section( 'content' )

<div class="row">
    <h1>Account Home</h1>

    <div class="col-sm-5 well">

      @if( Auth::user()->isPaid() )
        
        @if(Auth::user()->racers->count() < 4)
          <a class="btn btn-primary" href="/account/add-racer"><i class="glyphicon glyphicon-plus-sign"></i> Add Racer</a>
        @endif
        
        <h2>Racers</h2>

        <ul>
        @foreach( Auth::user()->racers as $racer )
          <li><a href="/account/racer/{{ $racer->present()->id }}">{{ $racer->present()->fullName }}</a></li>
        @endforeach
        </ul>
      @else
        <p>Our records indicate that you have not yet paid for the <strong>SkiTime</strong> service.</p>
        @include('partials.paypal-form')
      @endif

    </div>

    <div class="col-sm-5 col-sm-offset-1 well">
        <a href="/account/edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-edit"></i> Edit Account</a>
      <h2>Account Details</h2>
      <p>{{ Auth::user()->present()->fullName }}</p>
      <p>{{ Auth::user()->present()->email }}</p>
    </div>

</div>

@stop