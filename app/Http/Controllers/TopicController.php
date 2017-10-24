<?php

namespace App\Http\Controllers;

use App\Field;
use App\Http\Requests\TopicCreateRequest;
use App\Level;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$fields = Field::get();
    	$levels = Level::get();
      
      return view('frontend.topics.create', compact(['fields', 'levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    public function store(TopicCreateRequest $request)
    {
        // dd($request->all());
        $topic = new Topic($request->all());

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = config('image.name_prefix') . "-" . $file->hashName();
            $file->move('files/', $fileName);
            $topic['document_path'] = 'files/'.$fileName;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = config('image.name_prefix') . "-" . $file->hashName();
            $file->move(config('image.topic.path_upload'), $fileName);
            $topic['img'] = 'images/topic/'.$fileName;
        }

        if ($topic->save()) {
            flash(__('Your sicence topics created successful! Please waiting for ADMIN approve'))->success();
            return redirect()->route('home.index');
        } else {
            flash(__('Creation failed!'))->error();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('frontend.topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
