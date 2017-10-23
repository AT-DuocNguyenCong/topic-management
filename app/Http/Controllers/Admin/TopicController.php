<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        // \DB::enableQueryLog();
        // $topics = Topic::with('level')->get();
        $topics = Topic::orderby('id', 'DESC')->paginate(10);
        // dd(\DB::getQueryLog());
        return view('backend.topics.index', compact('topics'));
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function topicsPending()
    {   
        $topics = Topic::orderby('id', 'DESC')->paginate(10);

        $topics = Topic::where('status', Topic::STATUS_PENDING_ADMIN)->orderby('id', 'DESC')->paginate(10);
        return view('backend.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $topic = Topic::findOrFail($id);
        if ($topic->delete()) {
            flash(__('Delete success!'))->success();
            return redirect()->route('topics.index');
        } else {
            flash(__('Delete failure'))->error();
            return redirect()->route('topics.index');
        }
    }
}
