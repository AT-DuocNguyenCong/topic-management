<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateLevelRequest;
use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::orderby('id', 'DESC')->paginate(Level::PER_PAGE);
        return view('backend.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLevelRequest $request)
    {
        $level = Level::create($request->all());
        if ($level) {
            flash(__('Create Level Success!'))->success();
            return redirect()->route('levels.index');
        } else {
            flash(__('Create Level Fail!'))->fail();
            return redirect()->back(); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('backend.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLevelRequest $request, $id)
    {
        $level = Level::findOrFail($id);
        $result = $level->update($request->all());
        if ($result) {
            flash(__('Update Level Success!'));
            return redirect()->route('levels.index');
        } else {
            flash(__('Update Level Fail!'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id)->delete();
        if ($level) {
            flash(__('Delete Level Success!'));
        } else {
            flash(__('Delete Level Fail!'));
        }
        return redirect()->route('levels.index');
    }
}
