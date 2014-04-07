<?php

class PublicSiteController extends BaseController {


  public function home()
  {
    return View::make( 'public-site.home' );
  }


  public function contactUs()
  {
    return View::make( 'public-site.contact-us' );
  }


  public function ourSponsors()
  {
    return View::make( 'public-site.our-sponsors' );
  }


  public function signUp()
  {
    return View::make( 'public-site.sign-up' )->withUser(new Times\Users\User);
  }


  public function ticket()
  {
    return View::make( 'public-site.ticket' );
  }

  public function download()
  {
      return View::make( 'public-site.download' );
  }

} 