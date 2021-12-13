<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APICtr extends Controller
{
    public function ajaxSearch(Request $req)
    {
        $doneProduct = DB::table('product')
                ->where('name', 'like', ''.$req->searchProduct.'%')->get();
        
        return $doneProduct;
    }
}
