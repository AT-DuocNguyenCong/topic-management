<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\UserTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleRequestJoin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $userTopics = UserTopic::with('topic')->with('user')->where('status', UserTopic::STATUS_PENDING)->paginate(10);
        return view('backend.handle_requests.index', compact('userTopics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
    	$userTopic = UserTopic::findOrFail($id);
    	// dd($userTopic->user);
        $userTopic->status = UserTopic::STATUS_PROGRESS;

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->reciever_id = $userTopic->user->id;
        $message->status = Message::STATUS_PENDING;

        $link = route('user.topics.show', $userTopic->topic->id);
        $message->content = <<<EOT
            <p> Your request has been approved!</p> Thank you!
            <a href="$link">Please click to show detail</a>
EOT;

        if($userTopic->save() && $message->save()) {
            flash(__('Update status success!'))->success();
            return redirect()->route('handlerequest.index');
        } else {
            flash(__('failure'))->error();
            return redirect()->back();
        }
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unapprove($id)
    {	

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$message = Message::findOrFail($id);
        if ($message->delete()) {
            flash(__('Delete success!'))->success();
            return redirect()->route('messages.show', Auth::user()->id);
        } else {
            flash(__('Delete failure'))->error();
            return redirect()->back();
        }
    }
}
