<?php

namespace App\Http\Controllers\Admin;

use App\AcademicRank;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateAcademicRankRequest;
use Illuminate\Http\Request;

class AcademicRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicsrank = AcademicRank::orderby('id', 'DESC')->paginate(10);
        return view('backend.academicsrank.index', compact('academicsrank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academicsrank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAcademicRankRequest $request)
    {
        $academicrank = AcademicRank::create($request->all());
        if ($academicrank) {
            flash(__('Create Academic Rank Success!'))->success();
            return redirect()->route('academicsrank.index');
        } else {
            flash(__('Create Academic Rank Fail!'))->fail();
            return redirect()->back();
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
        $academicrank = AcademicRank::findOrFail($id);
        return view('backend.academicsrank.edit', compact('academicrank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAcademicRankRequest $request, $id)
    {
        $academicrank = AcademicRank::findOrFail($id)->update($request->all());
        if ($academicrank) {
            flash(__('Update Academic Rank Success!'))->success();
            return redirect()->route('academicsrank.index');
        } else {
            flash(__('Update Academic Rank Fail!'))->fail();
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
        $academicrank = AcademicRank::findOrFail($id)->delete();
        if ($academicrank) {
            flash(__('Delete Academic Rank Success!'))->success();
        } else {
            flash(__('Delete Academic Rank Fail!'))->fail();
        }
        return redirect()->route('academicsrank.index');
    }
}
