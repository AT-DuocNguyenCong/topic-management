<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateUserRequest;
use App\Http\Requests\Backend\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('id', 'DESC')->paginate(10);
        // dd($users);
        return view('backend.users.index', compact('users' , $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $users = new User($request->all());
        
        if ($users->save()) {
            flash(__('Creation successful!'))->success();
            return redirect()->route('user.index');
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
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        // dd($user);

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

        if ($user->update($request->all())) {
            flash(__('Update success'))->success();
            return redirect()->route('user.show', $id);
        } else {
            flash(__('Update failure'))->error();
            return redirect()->back()->withInput();
        }

    }

    /**
     * Update role of user.
     *
     * @param int $id id of user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateRole($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_admin == User::ROLE_ADMIN) {
            $user->update(['is_admin' => User::ROLE_USER]);
        } else {
            $user->update(['is_admin' => User::ROLE_ADMIN]);
        }
        flash(__('Change role successful for username: ' . $user->username))->success();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            flash(__('Delete success!'))->success();
            return redirect()->route('user.index');
        } else {
            flash(__('Delete failure'))->error();
            return redirect()->route('user.index');
        }
    }
}
