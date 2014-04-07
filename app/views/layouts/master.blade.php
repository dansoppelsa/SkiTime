<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ski Time | @yield('pageTitle', 'Home')</title>

  <meta name="description" content="@yield( 'metaDescription' , 'Ski Time - a ski race time tracking application.' )"/>

  <link rel="stylesheet" href="/css/style.min.css"/>

</head>
<body>

@include( 'partials._navbar' )

<div class="container">

  <div class="row">

    @if( Auth::check() )
      <p class="alert alert-info pull-right">
        Welcome, <a href="/account"><strong>{{ Auth::user()->present()->fullName }}</strong></a>
      </p>
    @endif

  </div>

  @if( Session::has('flash_message') )
    <div class="alert alert-info">
      {{ Session::get('flash_message') }}
    </div>
  @endif


  @yield('content')

</div>

<div class="container">
  <div class="row" id="footer">
    <p>&copy; {{ date("Y") }} <a href="http://www.doubleblackdiamond.ca" target="_blank">Ewan Gallacher</a></p>
  </div>
</div>

<script src="/js/app.min.js"></script>

@yield('scripts')

</body>