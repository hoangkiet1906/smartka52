<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StaffCtr extends Controller
{
    public function index(Request $req)
    {
        //dd($req->st);
        
        $st = DB::table('staff')->where('staff_name', '=', Session::get('Sst'))->first();

        $work = DB::table('work')->where('staff_name', '=', Session::get('Sst'))
            ->join('checkout', 'work.idcheckout', '=', 'checkout.idcheckout')
            ->join('info', 'checkout.user_name', '=', 'info.user_name')
            ->join('user', 'info.user_name', '=', 'user.user_name')->get();
        //dd($work);
        return view('Staff.index', [
            'st' => $st,
            'page' => 'work',
            'work' => $work
        ]);
    }
    public function done(Request $req)
    {
        //dd($req->st);
        
        $st = DB::table('staff')->where('staff_name', '=', Session::get('Sst'))->first();

        $work = DB::table('work')->where('staff_name', '=', Session::get('Sst'))
            ->join('checkout', 'work.idcheckout', '=', 'checkout.idcheckout')
            ->join('info', 'checkout.user_name', '=', 'info.user_name')
            ->join('user', 'info.user_name', '=', 'user.user_name')->get();
        //dd($work);
        return view('Staff.done', [
            'st' => $st,
            'page' => 'done',
            'work' => $work
        ]);
    }
    

    public function delAjax(Request $req)
    {
        DB::table('work')
            ->where('idcheckout', $req->delid)
            ->update((['status' => 'Complete',]));
        DB::table('checkout')
            ->where('idcheckout', $req->delid)
            ->update((['status' => 'Complete',]));
        print_r($req->delid);
    }
}
