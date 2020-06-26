<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Auth;
use Lang;

class WebComposer
{
  /**
   * Create a movie composer.
   *
   * @return void
   */
  public function __construct(Request $request)
  {

  }

  /**
   * Bind data to the view.
   *
   * @param  View  $view
   * @return void
   */
  public function compose(View $view)
  {
    // if(Auth::guard('admin')->check()){
    //   $view->with('authUser', $this->authUser);
    // }

    if(Auth::check()){
      $this->authUser = Auth::user();
    }else{
      $this->authUser = [];
    }
    $locale = app()->getLocale();

    //echo "<pre>", print_r($locale, 1), "</pre>"; exit;
    $view->with('authUser', $this->authUser);
    $view->with('base', config('app.url'));
    $view->with('locale', $locale);

    //Language
    /*
    $langs = Lang::get('columnLeft');
    foreach ($langs as $key => $value) {
      $tranLeft[$key] = $value;
    }
    $view->with('tranLeft', $tranLeft);
    */
  }
}
