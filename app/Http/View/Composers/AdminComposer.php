<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Http\Request;
//use Auth;

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
        //     echo 123; exit;
        // }
    }

    /**
     * Bind data to the view.
     *
     * @param    View    $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('base', config('app.url').'/admin');
        $view->with('locale', app()->getLocale());
    }
}
