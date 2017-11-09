<?php

namespace App\Http\Controllers;

use App\Field;
use App\Topic;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $fields = Field::whereHas('topicLimit', function ($query) {
            }, '>', 0)->orderby('id', 'DESC')->paginate(4);
            
        return view('frontend.fields.index', compact('fields'));
    }
}
