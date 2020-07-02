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
    $view->with('base', config('app.url'));
    $view->with('locale', $locale);
  }
}
