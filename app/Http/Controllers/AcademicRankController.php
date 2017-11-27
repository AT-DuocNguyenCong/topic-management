<?php

namespace App\Http\Controllers;

use App\AcademicRank;
use App\Http\Requests\Frontend\CreateAcademicRankRequest;
use App\User;
use App\UserAcademicsRank;
use Illuminate\Http\Request;

class AcademicRankController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $academicsrank = AcademicRank::whereNotIn('id', function($query) use ($id) {
            $query->select('academic_rank_id')->from('user_academic_rank')->where('user_id', $id);
        })->get();
        $AcademicsrankUser = User::findOrFail($id)->userAcademicsrank;
        return view('frontend.academicsrank.create', compact('AcademicsrankUser', 'academicsrank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createhv($id)
    {
        $academicsrank = AcademicRank::whereNotIn('id', function($query) use ($id) {
            $query->select('academic_rank_id')->from('user_academic_rank')->where('user_id', $id);
        })->get();
        $AcademicsrankUser = User::findOrFail($id)->userAcademicsrank;
        return view('frontend.academicsrank.createhv', compact('AcademicsrankUser', 'academicsrank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param                            $id id of user
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAcademicRankRequest $request, $id)
    {
        $userAcademicsrank = UserAcademicsRank::create([
            "user_id" => $id,
            "academic_rank_id" => $request->academic_rank_id,
            "graduate" => $request->graduate
        ]);
        if ($userAcademicsrank) {
            flash(__('Update Your Academic Rank Success!'))->success();
            return redirect()->back();
        } else {
            flash(__('Update Your Academic Rank Fail!'))->fail();
            return redirect()->back()->withInput();
        }
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param                            $id id of user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $tmp = UserAcademicsRank::findOrFail($id)->delete();
        if ($tmp) {
            flash(__('Delete Field Success!'))->success();
        } else {
            flash(__('Delete Field Fail!'))->fail();
        }
        return redirect()->back();
    }
}
