<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $topics = Topic::with('user')->orderby('id', 'DESC')->paginate(10);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('backend.topics.accept', compact('topic'));
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

        $usertopic = $topic->usertopics;
        if ($topic->delete() && $usertopic->delete()) {
            flash(__('Delete success!'))->success();
            return redirect()->route('topics.index');
        } else {
            flash(__('Delete failure'))->error();
            return redirect()->route('topics.index');
        }
    }

    public function adminUpdateStatus(Request $request, $id)
    {
        $topic = Topic::with('user')->findOrFail($id);
        $topic->status = $request['status'];

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->reciever_id = $topic->user->id;
        $message->status = Message::STATUS_PENDING;

        $link = route('user.topics.show', $topic->id);

        if ($topic->status == Topic::STATUS_FINISH) {
            $message->content = <<<EOD
            <p> Your topic finished. </p> Thank you!<a href="$link">Please click to show detail</a>
EOD;
        } else {
            $message->content = $request->content;
        }

        if($topic->save() && $message->save()) {
            flash(__('Update status success!'))->success();
            return redirect()->route('topics.index');
        } else {
            flash(__('failure'))->error();
            return redirect()->route('topics.index');
        }
    }
}
