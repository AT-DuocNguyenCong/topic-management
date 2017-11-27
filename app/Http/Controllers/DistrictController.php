<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
	public function getDistrict(Request $request)
	{
		$matp = $request->matp;
		$districts = DB::table('devvn_quanhuyen')->join('devvn_tinhthanhpho', 'devvn_quanhuyen.matp', '=', 'devvn_tinhthanhpho.matp')->select('devvn_quanhuyen.name', 'devvn_quanhuyen.maqh')->where('devvn_quanhuyen.matp', $matp)->get();
		return response()->json(['districts' => $districts], 200);
	}

	public function getTown(Request $request)
	{
		$maqh = $request->maqh;
		$towns = DB::table('devvn_xaphuongthitran')->join('devvn_quanhuyen','devvn_quanhuyen.maqh', '=', 'devvn_xaphuongthitran.maqh')->select('devvn_xaphuongthitran.name', 'devvn_xaphuongthitran.xaid')->where('devvn_xaphuongthitran.maqh', $maqh)->get();
		return response()->json(['towns' => $towns], 200);
	}
}
