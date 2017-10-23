<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateFieldRequest;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::orderby('id', 'DESC')->paginate(Field::PER_PAGE);
        return view('backend.fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFieldRequest $request)
    {
        $field = Field::create($request->all());
        if ($field) {
            flash(__('Create Field Success!'))->success();
            return redirect()->route('fields.index');
        } else {
            flash(__('Create Field Fail!'))->fail();
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
        $field = Field::findOrFail($id);
        return view('backend.fields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFieldRequest $request, $id)
    {
        $field = Field::findOrFail($id)->update($request->all());
        if ($field) {
            flash(__('Update Field Success!'))->success();
            return redirect()->route('fields.index');
        } else {
            flash(__('Update Field Fail!'))->fail();
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
        $field = Field::findOrFail($id)->delete();
        if ($field) {
            flash(__('Delete Field Success!'))->success();
        } else {
            flash(__('Delete Field Fail!'))->fail();
        }
        return redirect()->route('fields.index');
    }
}
