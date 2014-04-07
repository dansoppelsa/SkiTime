@extends( 'layouts.master' )

@section( 'pageTitle' , 'Welcome' )

@section( 'content' )

<div class="row">
  <div class="jumbotron text-center">
    <img src="http://3.bp.blogspot.com/_-4m0l405yF0/TLaa5UcF10I/AAAAAAAAADQ/BkNRsUJyhZE/s1600/Olympic_Ski_Racing.jpg" class="img-responsive" alt="" />
    <h1>Welcome to <span>Ski Time</span></h1>
    <p>This is an app that keeps track of ski races</p>
    <p>It's only $1.99 and can support up to 4 racers.</p>
    <a href="/sign-up" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-play-circle"></i> Sign Up Now!</a>
  </div>
</div>

@stop