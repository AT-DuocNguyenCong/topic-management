<?php

namespace App\Http\Controllers;

use App\Field;
use App\Http\Requests\Frontend\UpdateUserRequest;
use App\Message;
use App\User;
use App\UserAcademicsRank;
use App\UserTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $cities = DB::table('devvn_tinhthanhpho')->orderby('matp', 'ASC')->get();
        if ($id == Auth::user()->id) {
            $user = User::findOrFail($id);
            return view('frontend.users.show', compact('user', 'cities'));
        }
    }


    public function showMessage($id)
    {
        $messages = Message::where('reciever_id', $id)->orderby('id', 'DESC')->paginate(3);

        return view('frontend.messages.index', compact('messages'));
    }
    
    public function topicParticipate(Request $request)
    {
        $usertopic = new UserTopic($request->all());
        if ($usertopic->save()) {
            flash(__('Participate success, Please waiting for ADMIN!'))->success();
            return redirect()->route('home.index');
        } else {
            flash(__('Failure, please try again!'))->error();
            return redirect()->back();
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {   
        $user = User::findOrFail($id);
        if ($request['password'] == null) {
            unset($request['password']);
            unset($request['password_confirmation']);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = config('image.name_prefix') . "-" . $file->hashName();
            $file->move(config('image.user.path_upload'), $fileName);
            $request['path'] = 'images/user/'.$fileName;
        }
        if($request['tinhthanh'] != null && $request['quanhuyen'] != null && $request['xaphuong'] != null) {
            $city = DB::table('devvn_tinhthanhpho')->select('name')->where('matp', $request->tinhthanh)->get();
            $cityName = implode('',$city->pluck('name')->toarray());
            $quanhuyen = DB::table('devvn_quanhuyen')->select('name')->where('maqh', $request->quanhuyen)->get();
            $districtName = implode('',$quanhuyen->pluck('name')->toarray());
            $xaphuong = DB::table('devvn_xaphuongthitran')->select('name')->where('xaid', $request->xaphuong)->get();
            $townName = implode('',$xaphuong->pluck('name')->toarray());
            $hometown = ['hometown' => $townName. ', ' .$districtName. ', ' .$cityName];
            $result = $user->update(array_merge(($request->except('tinhthanh', 'quanhuyen', 'xaphuong')), $hometown));
        } else {
            $result = $user->update($request->all());
        }
        
        if ($result) {
            flash(__('Update Profile Success!'))->success();
        } else {
            flash(__('Update Profile Fail!'))->error();
        }
        return redirect()->route('profile.show', $user->id);   
    }
}
