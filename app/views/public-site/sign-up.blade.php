@extends( 'layouts.master' )

@section( 'pageTitle' , 'Login' )


@section( 'content' )

<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <h1>Sign Up For a <strong>Ski Time</strong> Account</h1>

        @include( 'partials.forms._user' )

    </div>
</div>

@stop