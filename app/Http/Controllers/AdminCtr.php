<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminCtr extends Controller
{
    public function index(Request $req)
    {
        //main
        $support = DB::table('support')->get();
        foreach ($support as $key) {
            $img[$key->user_name] = DB::table('user')
                ->where('user_name', '=', $key->user_name)
                ->get();
        }
        Session::put('support', $support);
        Session::put('img', $img);
        //dd($img['trinh'][0]->avatar);
        //endmain
        $PurchaseQuantity = DB::table('checkout')->orderByRaw('date_checkout DESC')->paginate(8);
        $UserQuantity = DB::table('user')->paginate(8);
        Session::put('countUser', $UserQuantity);
        Session::put('countCheckout', DB::table('checkout')->get());
        $CartQuantity = DB::table('cart')->count();
        foreach ($UserQuantity as $key) {
            $date = Carbon::now('Asia/Ho_Chi_Minh');
            //Get date and time
            $date->toDateTimeString();
            $Udate[$key->user_name] = $date;
        }
        $topUser = DB::table('checkout')->select('user_name')->distinct()->get();
        foreach ($topUser as $key) {
            $topU[$key->user_name] = DB::table('checkout')
                ->where('user_name', '=', $key->user_name)
                ->sum('total_money');
        }
        //ksort($topU);
        natsort($topU);
        $topUD = $topU;
        $topU = array_reverse($topU);

        foreach ($topU as $key => $value) {
            $topUI[$key] = DB::table('user')
                ->where('user_name', '=', $key)
                ->get();
        }
        //dd($topUI['kietest'][0]->avatar);

        return view('Admin.index', [
            // 'title' => 'Hi ' . Session::get('Suser_name'),
            'page' => 'quanli1',
            'PurchaseQuantity' => $PurchaseQuantity,
            'UserQuantity' => $UserQuantity,
            'CartQuantity' => $CartQuantity,
            'Udate' => $Udate,
            'topU' => $topU,
            'topUI' => $topUI,
        ]);
    }
    public function index2(Request $req)
    {
        $Pro = DB::table('cart')->get();
        $topPro = DB::table('cart')->select('*')->distinct()->get();

        foreach ($topPro as $key) {
            $countTopPro[$key->id] = 0;
            foreach ($Pro as $p) {
                if ($key->id == $p->id) {
                    $countTopPro[$key->id] = $countTopPro[$key->id] + $p->cartquantity;
                }
            }
        }
        natsort($countTopPro);
        $countGaPro = array_slice($countTopPro, 0, 5, true);
        $countTopPro = array_reverse($countTopPro, true);
        $countTopPro = array_slice($countTopPro, 0, 5, true);

        foreach ($countTopPro as $key => $value) {
            $topProReal[$key] = DB::table('product')->where('id', $key)->get();
        }

        foreach ($countGaPro as $key => $value) {
            $gaProReal[$key] = DB::table('product')->where('id', $key)->get();
        }
        //dd($topProReal);
        //month
        //$dt = Carbon::now();
        //$dataToday = Data::whereDay('created_at', $dt->day)->get();
        $date = Carbon::today()->subDays(7);
        $inWeek = DB::table('checkout')->where('date_checkout', '>=', $date)->get();
        $inYear = DB::table('checkout')->get();
        $totalWeek = 0;
        $totalYear = 0;
        foreach ($inWeek as $w) {
            $totalWeek = $totalWeek + $w->total_money;
        }
        foreach ($inYear as $y) {
            $totalYear = $totalYear + $y->total_money;
        }
        //dd($inWeek);
        $inWeek2 = DB::table('checkout')->where('date_checkout', '<=', $date)->get();
        $totalWeek2 = 0;
        foreach ($inWeek2 as $w) {
            $totalWeek2 = $totalWeek2 + $w->total_money;
        }

        return view('Admin.indexx', [
            // 'title' => 'Hi ' . Session::get('Suser_name'),
            'page' => 'quanli2',
            'countTopPro' => $countTopPro,
            'topProReal' => $topProReal,
            'countGaPro' => $countGaPro,
            'gaProReal' => $gaProReal,
            'totalWeek' => $totalWeek,
            'totalYear' => $totalYear,
            'inWeek' => $inWeek,
            'inWeek2' => $inWeek2,
            'totalWeek2' => $totalWeek2,
        ]);
    }
    public function staff(Request $req)
    {
        $st = DB::table('staff')->select('*')->get();
        $ck = DB::table('checkout')->select('*')->get();
        foreach ($ck as $s) {
            $crow = 0;
            $crow = DB::table('work')->orderBy('id', 'desc')->first();
            if($s->idcheckout > $crow->id){
                DB::insert('insert into work (id, staff_name, idcheckout, status) values (?, ?, ?, ?)', 
                [$s->idcheckout, 'kietbocvac', $s->idcheckout, $s->status]);
            }
        }
        $staff = DB::table('staff')->get();
        $cck = DB::table('work')->select('*')->get();
        foreach ($staff as $s) {
            $count[$s->staff_name]=0;
            foreach ($cck as $c){
                if($s->staff_name == $c->staff_name && $c->status == 'Processing'){
                    $count[$s->staff_name]=$count[$s->staff_name]+1;
                } 
            }
        }
        foreach ($staff as $s) {
            $countc[$s->staff_name]=0;
            foreach ($cck as $c){
                if($s->staff_name == $c->staff_name && $c->status == 'Complete'){
                    $countc[$s->staff_name]=$countc[$s->staff_name]+1;
                } 
            }
        }
        
        return view('Admin.staff', [
            // 'title' => 'Hi ' . Session::get('Suser_name'),
            'page' => 'qlstaff',
            'st' => $st,
            'count' => $count,
            'countc' => $countc,
        ]);
    }
    














    //chiniu
    public function blog(Request $req)
    {
        $blogs = DB::table('blogde')->select('*')
            ->join('blog', 'blogde.idblog', '=', 'blog.idblog')->orderBy('date', 'desc')->paginate(6);

        return view('Admin.blog', [
            // 'title' => 'Hi ' . Session::get('Suser_name'),
            'page' => 'qlblog',
            'blogs' => $blogs,
        ]);
    }
    public function changeStatus(Request $req, $id)
    {

        DB::update('update blog set status=? where idblog = ?', [$req->idstatus, $id]);

        return redirect()->back();
    }

    public function deleteBlog(Request $req)
    {

        if ($req->deleteblog != null) {
            DB::table('blogde')->where('idblog', '=', $req->deleteblog)->delete();
            DB::table('blog')->where('idblog', '=', $req->deleteblog)->delete();
        }

        return redirect()->back();
    }
    public function updateBlog(Request $req, $id)
    {

        DB::update(
            'update blog set title=?,author=?,content=?,image=?,tag=? where idblog = ?',
            [$req->uptitle, $req->upauthor, $req->upcontent, $req->upimage, $req->uptag, $id]
        );
        DB::update(
            'update blogde set ct1=?,ct2=?,ct3=?,image1=?,image2=? where idblog = ?',
            [$req->upcontent1, $req->upcontent2, $req->upcontent3, $req->upimage1, $req->upimage2, $id]
        );
        return redirect()->back();
    }
    public function insertBlog(Request $req)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $date->toDateTimeString();
        // $crow = DB::table('blog')->count();
        $crow = DB::table('blog')->orderBy('idblog', 'desc')->first();
        $id = (int)$crow->idblog;

        DB::table('blog')->insert([
            'idblog' =>  $id + 1,
            'title' => $req->title,
            'author' => Session::get('Suser_name'),
            'content' => $req->content,
            'date' => $date,
            'image' => $req->image,
            'tag' => $req->tag,
            'status' => '1',
        ]);
        DB::table('blogde')->insert([
            'ct1' => $req->content1,
            'ct2' => $req->content2,
            'ct3' => $req->content3,
            'image1' => $req->image1,
            'image2' => $req->image2,
            'idblog' => $id + 1,
        ]);
        return redirect()->back();
    }


    
    public function product(Request $req)
    {
       $products = DB::table('productde')->select('*')
                    ->join('product', 'productde.id', '=', 'product.id')->orderBy('name', 'asc')
                    ->paginate(8);
        
        return view('Admin.product', [
            'page' => 'qlproduct',
            'pros' => $products,
        ]);
    }

    public function deleteProduct(Request $req) {
        
        if($req->deleteproduct != null) {
            DB::table('cart')->where('id', '=', $req->deleteproduct)->delete();
            DB::table('productde')->where('id', '=', $req->deleteproduct)->delete();
            DB::table('product')->where('id', '=', $req->deleteproduct)->delete();
        }
        
        return redirect()->back();
    }
    public function updateProduct(Request $req, $id){
        
        DB::update(
            'update product set name=?,price=?,quantity=?,image=?,description=?,tag=?,status=? where id = ?',
            [$req->upname, $req->upprice, $req->upquantity, $req->upimage, $req->updesc, $req->uptag, $req->upstatus, $id]
        );
        DB::update(
            'update productde set details=?,specifications=? where id = ?',
            [$req->updetail, $req->upspec, $id]
        );
        return redirect()->back();
    }
    public function insertProduct (Request $req) {

        $crow = DB::table('product')->orderBy('id', 'desc')->first();
        $id = (int)$crow->id;
        $cstt = DB::table('productde')->orderBy('stt', 'desc')->first();
        $stt = (int)$cstt->stt;
        DB::table('product')->insert([
            'id' =>  $id+1,
            'name' => $req->productname,
            'price' => $req->price,
            'quantity' => $req->quantity,
            'description' => $req->description,
            'image' => $req->image,
            'view' =>'0' ,
            'tag' => $req->tag,
            'status' => $req->status,
        ]);
        DB::table('productde')->insert([
            'stt' => $stt+1,
            'details' => $req->detail,
            'specifications' => $req->specifications,
            'id' =>  $id+1,
        ]);
        return redirect()->back();
    }
}
