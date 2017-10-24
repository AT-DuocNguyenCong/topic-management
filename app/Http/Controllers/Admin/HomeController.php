<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Http\Controllers\Controller;
use App\Level;
use App\Topic;
use App\User;

class HomeController extends Controller
{
	/**
     * Return the view index page.
     *
     * @return view
    */
    public function index()
    {
        $users = User::count();
        $topics = Topic::count();
        $fields = Field::count();
        $levels = Level::count();
        return view('backend.home.index', compact(
            'users',
            'topics',
            'fields',
            'levels'
        ));
    }
}
