<?php

namespace App\Http\Controllers;

use App\Field;
use App\Topic;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        if ($request['fieldname'] == null) {
            $fields = Field::with(['topics' => function($query) use ($request) {
                $query->select()->where('name', 'like', '%'.$request->topicname.'%');  
            }])->paginate(4)->appends(['topicname' => request('topicname')]);
            return view('frontend.fields.index', compact('fields'));
        } else {
            $fields = Field::where('id', $request->fieldname)->with(['topics' => function($query) use ($request) { $query->select()->where('name', 'like', '%'.$request->topicname.'%');
            }])->paginate(1)->appends(['topicname' => request('topicname')]);
            return view('frontend.fields.index', compact('fields'));
        }
    }
}
