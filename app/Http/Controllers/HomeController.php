<?php

namespace App\Http\Controllers;

use App\Message;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
    	$topics = Topic::where('status', Topic::STATUS_IN_PROGRESS)
    			->orWhere('status', Topic::STATUS_FINISH)->orderby('id', 'DESC')->paginate(4);
        return view('frontend.home.index', compact('topics'));
    }
}
