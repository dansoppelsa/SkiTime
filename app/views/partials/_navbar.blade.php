<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="/" class="navbar-brand">Ski Time</a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li><a href="/contact-us">Contact Us</a></li>
        <li><a href="/our-sponsors">Our Sponsors</a></li>
        @if( Auth::guest() )
          <li><a href="/login"><i class="glyphicon glyphicon-log-in"></i> LOGIN</a></li>
        @endif
      </ul>

      @if( Auth::check() )
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/account"><i class="glyphicon glyphicon-cog"></i> MY ACCOUNT</a></li>
            <li><a href="/logout"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a></li>
        </ul>
      @endif

    </div>
  </div>
</div>