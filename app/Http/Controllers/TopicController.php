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
            return redirect()->back()->with('msg', __('Success! Thank you!'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('frontend.topics.edit', compact('topic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $topic = Topic::findOrFail($id);
        $result = $topic->update($request->all());
        if ($result) {
            flash(__('Update Success!'))->success();
            return redirect()->route('user.topics.show', $topic->id);
        } else {
            flash(__('Update Fail!'))->fail();
            return redirect()->back();
        }
    }
}
