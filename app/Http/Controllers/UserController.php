<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\UserTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == Auth::user()->id) {
            $user = User::findOrFail($id);
            return view('frontend.users.show', compact('user'));
        }
        else {
            return response()->view('frontend.errors.403');
        }
    }

    public function showMessage($id)
    {
        $messages = Message::where('reciever_id', $id)->orderby('id', 'DESC')->paginate(3);

        return view('frontend.messages.index', compact('messages'));
    }
}
