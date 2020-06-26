<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Auth;

class AdminComposer
{
  /**
   * Create a movie composer.
   *
   * @return void
   */
  public function __construct(Request $request)
  {
    // if(Auth::guard('admin')->check()){
    //   $this->adminUser = Auth::user();
    // }

    // $this->adminUser = Auth::user();
    //echo "<pre>", print_r($this->adminUser, 1), "</pre>"; exit;

  }

  /**
   * Bind data to the view.
   *
   * @param  View  $view
   * @return void
   */
  public function compose(View $view)
  {
    $locale = \App::getLocale();

    // if(Auth::guard('admin')->check()){
    //   $view->with('authUser', $this->authUser);
    // }

    //$view->with('adminUser', Auth::user());
    $view->with('base', config('app.url'));
  }
}
