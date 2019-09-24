<?php

namespace App\Http\Controllers;

use Litepie\User\Traits\RoutesAndGuards;

class PublicController extends Controller
{
    use RoutesAndGuards;

    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return 'Welcome to ' . config('name');
    }
}
