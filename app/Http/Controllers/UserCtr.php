<?php

namespace App\Http\Controllers;

use finfo;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Info;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserCtr extends Controller
{
    public function index()
    {
        $tags = DB::table('product')->distinct()->get(['tag']);
        foreach ($tags as $key) {
            $ltags[$key->tag] = DB::table('product')->where('tag', '=', $key->tag)->first();
        }
        $pro = DB::table('product')->get();
        //dd($ltags);
        //trinh làm load latest blog
        $latestblog = DB::table('blog')
            ->orderByRaw('date DESC')->paginate(3);
        //
        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.index', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
                'ltags' => $ltags,
                'pro' => $pro,
                'latestblogs' => $latestblog
            ]);
        } else
            $cartactive = null;
        return view('User.index', [
            'title' => 'Hi',
            'login' => 'login',
            'ltags' => $ltags,
            'pro' => $pro,
            'latestblogs' => $latestblog
        ]);
    }
    public function login()
    {
        Session::forget('Sst');
        Session::forget('Suser_name');
        Session::forget('Savatar');
        Session::forget('Scartactive');
        return view('User.login', [
            'title' => 'Hi',
            'login' => 'login'
        ]);
    }
    public function authlogin(Request $req)
    {
        $this->validate($req, [
            'user_name' => 'required',
            'password' => 'required'
        ]);
        if($req->user_name=='kietadmin'){
            return App::call('App\Http\Controllers\AdminCtr@index');
        }
        if($req->user_name=='kietbocvac' || $req->user_name=='kietchanbo' || $req->user_name=='kietphuho'){
            Session::put('Sst', $req->user_name);
            return App::call('App\Http\Controllers\StaffCtr@index');
        }
        
        if (Auth::attempt([
            'user_name' => $req->user_name,
            'password' => $req->password
        ])) {
            Session::put('Suser_name', $req->user_name);
            $avt = DB::table('user')->where('user_name', Session::get('Suser_name'))->first();
            Session::put('Savatar', $avt->avatar);
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Login unsuccessful');
        }
    }
    public function authres(Request $req)
    {
        // dd($req->all());
        $this->validate($req, [
            'user_name' => 'required',
            'password' => 'required',
            'Cpassword' => 'required'
        ]);

        if ($user = User::where('user_name', '=', $req->user_name)->first()) {
            return redirect()->back()->with('error', 'Account already exists');
        } else {
            if ($req->password != $req->Cpassword) {
                return redirect()->back()->with('error', 'Passwords are not the same');
            } else {
                $date = Carbon::now('Asia/Ho_Chi_Minh');
                //Get date and time
                $date->toDateTimeString();
                DB::table('user')->insert([
                    'user_name' => $req->user_name,
                    'password' => Hash::make($req->password),
                    'avatar' => 'avt.jpg',
                    'date' => $date
                ]);
                return redirect()->back()->with('success', 'Sign Up Success');
            }
        }
    }

    public function myaccount()
    {
        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            if ($info = Info::where('user_name', '=', Session::get('Suser_name'))->first()) {
                $row = DB::table('info')->where('user_name', Session::get('Suser_name'))->first();
                return view('User.myaccount', [
                    'title' => 'Hi ' . Session::get('Suser_name'),
                    'login' => 'myaccount',
                    'row' => $row,
                    'oders' => DB::table('checkout')->where('user_name', Session::get('Suser_name'))->get(),
                ]);
            } else {
                $row = null;
                $oders = null;
                return view('User.myaccount', [
                    'title' => 'Hi ' . Session::get('Suser_name'),
                    'login' => 'myaccount',
                    'row' => $row,
                    'oders' => DB::table('checkout')->where('user_name', Session::get('Suser_name'))->get(),
                ]);
            }
        } else
            return view('User.index', [
                'title' => 'Hi',
                'login' => 'login'
            ]);
    }

    public function upInfo(Request $req)
    {
        $cartactive = DB::table('cart')
            ->select('*')
            ->join('product', 'cart.id', '=', 'product.id')
            ->where('cart.user_name', Session::get('Suser_name'))
            ->get();
        Session::put('Scartactive', $cartactive);
        if ($info = Info::where('user_name', '=', Session::get('Suser_name'))->first()) {
            DB::update(
                'update info set fullname=?,phone=?,email=?,address=?,deliveryaddress=? where user_name = ?',
                [$req->hoten, $req->sdt, $req->email, $req->dc, $req->dcgiaohang, Session::get('Suser_name')]
            );
            return redirect()->back()->with('chinhsua', 'Successfully edited personal information');
        } else {
            $crow = DB::table('info')->count() + 1;
            DB::table('info')->insert([
                'id' => $crow,
                'fullname' => $req->hoten,
                'phone' => $req->sdt,
                'email' => $req->email,
                'address' => $req->dc,
                'deliveryaddress' => $req->dcgiaohang,
                'user_name' => Session::get('Suser_name'),
            ]);
            return redirect()->back()->with('themmoi', 'Successfully added personal information');
        }
    }



    public function shop(Request $req)
    {
        $tags = DB::table('product')->distinct()->get(['tag']);
        foreach ($tags as $key) {
            $ltags[$key->tag] = DB::table('product')->where('tag', '=', $key->tag)->count();
        }
        if ($req->searchProduct != null) {
            $pro = DB::table('product')->where('name', 'like', '' . $req->searchProduct . '%')->Paginate(9);
        } else
            $pro = DB::table('product')->Paginate(9);
        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.shop', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
                'pro' => $pro,
                'ltags' => $ltags
            ]);
        } else
            return view('User.shop', [
                'title' => 'Hi',
                'login' => 'login',
                'pro' => $pro,
                'ltags' => $ltags
            ]);
    }

    public function ajaxSearch(Request $req)
    {
        $pro = DB::table('product')
            ->where('name', 'like', '%' . $req->searchProduct . '%')->get();

        return view('User.ajaxSearch', compact('pro'));
    }

    public function shoptag(Request $req)
    {
        $tags = DB::table('product')->distinct()->get(['tag']);
        foreach ($tags as $key) {
            $ltags[$key->tag] = DB::table('product')->where('tag', '=', $key->tag)->count();
        }
        $pro = DB::table('product')->where('tag', '=', $req->tag)->Paginate(9);
        if (Session::has('Suser_name')) {
            return view('User.shop', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
                'pro' => $pro,
                'ltags' => $ltags
            ]);
        } else
            return view('User.shop', [
                'title' => 'Hi',
                'login' => 'login',
                'pro' => $pro,
                'ltags' => $ltags
            ]);
    }


    public function product(Request $req)
    {

        $pro = DB::table('product')
            ->select('*')
            ->join('productde', 'product.id', '=', 'productde.id')
            ->where('productde.id', $req->id)
            ->get();
        $pro2 = DB::table('product')->where('tag', '=', $pro[0]->tag)->get();
        // dd($pro2);
        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.product', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',

            ], compact('pro', 'pro2'));
        } else
            return view('User.product', [
                'title' => 'Hi',
                'login' => 'login',

            ], compact('pro', 'pro2'));
    }

    public function cart()
    {
        $cartactive = DB::table('cart')
            ->select('*')
            ->join('product', 'cart.id', '=', 'product.id')
            ->where('cart.user_name', Session::get('Suser_name'))
            ->get();
        Session::put('Scartactive', $cartactive);
        $cart = DB::table('cart')
            ->select('*')
            ->join('product', 'cart.id', '=', 'product.id')
            ->where('cart.user_name', Session::get('Suser_name'))
            ->get();
        //dd($cart);
        return view('User.cart', [
            'title' => 'Hi ' . Session::get('Suser_name'),
            'login' => 'myaccount',
            'cart' => $cart
        ]);
    }



    public function addCartAjax(Request $req)
    {
        if ($cart = Cart::where('user_name', '=', Session::get('Suser_name'))->where('id', '=', $req->c_id)->first()) {
            DB::update(
                'update cart set cartquantity=cartquantity+? where id = ?',
                [$req->c_cartquantity, $req->c_id]
            );
        } else {
            $croww = DB::table('cart')->orderBy('idcart', 'desc')->first();
            $crow = $croww->idcart + 1;
            DB::table('cart')->insert([
                'idcart' => $crow,
                'cartquantity' => $req->c_cartquantity,
                'user_name' => Session::get('Suser_name'),
                'id' => $req->c_id
            ]);
        }

        print_r('Add to cart successfully');
        //print_r($req->all());

    }

    public function delCartAjax(Request $req)
    {
        Session::forget('Scartactive');
        DB::table('cart')->where('id', $req->delid)->where('user_name', Session::get('Suser_name'))->delete();
        $cartactive = DB::table('cart')
            ->select('*')
            ->join('product', 'cart.id', '=', 'product.id')
            ->where('cart.user_name', Session::get('Suser_name'))
            ->get();
        Session::put('Scartactive', $cartactive);
        print_r('Successfully removed from cart');
    }
    //checkout
    public function checkout(Request $req)
    {
        $fcountry = $req->fcountry;
        $fcity = $req->fcity;
        $ftotalmoney = $req->ftotalmoney;
        //dd($req->all());


        $cart = DB::table('cart')
            ->select('*')
            ->join('product', 'cart.id', '=', 'product.id')
            ->where('cart.user_name', Session::get('Suser_name'))
            ->get();
        //dd($cart);
        $finfo = DB::table('info')->where('user_name', Session::get('Suser_name'))->first();

        return view('User.checkout', [
            'title' => 'Hi ' . Session::get('Suser_name'),
            'login' => 'myaccount',
            'cart' => $cart,

            'fcountry' => $fcountry,
            'fcity' => $fcity,
            'ftotalmoney' => $ftotalmoney,
            'finfo' => $finfo
        ]);
    }

    public function addCheckoutAjax(Request $req)
    {
        $croww = DB::table('checkout')->orderBy('idcheckout', 'desc')->first();
        $crow = $croww->idcheckout + 1;
        DB::table('checkout')->insert([
            'idcheckout' => $crow,
            'user_name' => Session::get('Suser_name'),
            'payment_method' => $req->payment_method,
            'total_money' => $req->totals,
            'date_checkout' => $req->date,
            'status' => 'Processing'
        ]);



        print_r('Order Success');
    }

    public function changeAvt(Request $req)
    {

        DB::update(
            'update user set avatar=? where user_name = ?',
            [$req->pic, Session::get('Suser_name')]
        );
        Session::forget('Savatar');
        Session::put('Savatar', $req->pic);
        print_r("Profile photo update successfully");
    }

    public function support(Request $req)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $date->toDateTimeString();
        DB::table('support')->insert([
            'user_name' => $req->spName,
            'mess' => $req->spMess,
            'date' => $date
        ]);
        
        print_r("Message sent to admin");
    }


















    //Cua mam
    public function blog(Request $request)
    {
        // show blog 
        $blogs = DB::table('blog')->where('status', '=', '1')->paginate(6);
        //latest blog
        $sDates = DB::table('blog')
            ->orderByRaw('date DESC')->where('status', '=', '1')->paginate(2);
        //all tag
        $protags = DB::table('blog')->select('*')->where('status', '=', '1')->get();
        //search 
        $searchresults = '';
        if ($request->keysearch != null)
            $searchresults = DB::table('blog')->where('title', 'like', '%' . $request->keysearch . '%')
            ->where('status', '=', '1')->get();

        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.blog', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
                'blogs' => $blogs,
                'sDates' => $sDates,
                'protags' => $protags,
                'searchresults' => $searchresults
            ]);
        } else
            return view('User.blog', [
                'title' => 'Hi',
                'login' => 'login',
                'blogs' => $blogs,
                'sDates' => $sDates,
                'protags' => $protags,
                'searchresults' => $searchresults
            ]);
    }


    public function blogDe($id)
    {
        $blogdes='';
        $blogdes = DB::table('blog')
            ->join('blogde', 'blog.idblog', '=', 'blogde.idblog')
            ->select('*')->where('blog.idblog', '=', $id)->where('blog.status', '=', '1')
            ->get();

        // page change
        $sumblog = DB::table('blog')->count();
        $preid = 0;
        $nextid = 0;
        if ($id - 1) {
            $preid = $id;
            do {
                $preid -= 1;
                $preblog = Blog::where('idblog', '=', $preid)->first();
            } while ($preblog->status == 0 && $preid != 0);
            if($preid == 0) {
                $preid = $sumblog;
                do {
                    $preid -= 1;
                    $preblog = Blog::where('idblog', '=', $preid)->first();
                } while ($preblog->status == 0);
            }
        } else {
            $preid = $sumblog;
            do {
                $preblog = Blog::where('idblog', '=', $preid)->first();
                $preid -= 1;
            } while ($preblog->status == 0);
        }

        if ($id != $sumblog) {
            $nextid = $id;
            do {
                $nextid +=1;
                $nextblog = Blog::where('idblog', '=', $nextid)->first();
            } while ($nextblog->status == 0 && $nextid != $sumblog);
            
        } else {
            $nextid = 0;
            do {
                $nextid +=1;
                $nextblog = Blog::where('idblog', '=', $nextid)->first();
            } while ($nextblog->status == 0);
        }
        

        $sDates = DB::table('blog')->where('status', '=', '1')
            ->orderByRaw('date DESC')->paginate(3);
        // //all tag
        $protags = DB::table('blog')->select('*')->where('status', '=', '1')->get();

        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.blogDe', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
                'sDates' => $sDates,
                'protags' => $protags,
                'blogdes' => $blogdes,
                'preblog' => $preblog,
                'nextblog' => $nextblog,
            ]);
        } else
            return view('User.blogDe', [
                'title' => 'Hi',
                'login' => 'login',
                'sDates' => $sDates,
                'protags' => $protags,
                'blogdes' => $blogdes,
                'preblog' => $preblog,
                'nextblog' => $nextblog,
            ]);
    }

    public function sendCmtBlog(Request $request)
    {
        $username = Session::get('Suser_name');
        // print_r($request->cmtcontent);

        DB::insert(
            'insert into cmtblog (idcmt,cmtblog,cmtdate,user_name,idblog ) values (?, ?, ?, ?, ?)',
            [$request->idcmt, $request->cmtcontent, $request->date, $username, $request->idblog]
        );
    }

    public function loadCmtBlog(Request $request)
    {
        $idblog = $request->idblog;
        $cmts = DB::table('cmtblog')->select('*')->where('idblog', '=', $idblog)->get();

        foreach ($cmts as $key) {
            $avt[$key->user_name] = DB::table('user')->where('user_name', '=', $key->user_name)->get();
        }

        //dd($avt[Session::get('Suser_name')][0]->avatar);

        return view('User.ajaxLoadcmt', compact('cmts'), compact('avt'));
    }

    //pro
    public function sendCmtPro(Request $request)
    {

        DB::insert(
            'insert into cmtproduct (cmtpro,cmtdatepro,user_name,id) values ( ?, ?, ?, ?)',
            [$request->cmtcontent, $request->date, Session::get('Suser_name'), $request->idpro]
        );
    }

    public function loadCmtPro(Request $request)
    {
        $idpro = $request->idpro;
        $cmts = DB::table('cmtproduct')->select('*')->where('id', '=', $idpro)->get();

        foreach ($cmts as $key) {
            $avt[$key->user_name] = DB::table('user')->where('user_name', '=', $key->user_name)->get();
        }

        return view('User.ajaxLoadcmtPro', compact('cmts'), compact('avt'));
    }

    public function contactUs()
    {
        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.contactUs', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
            ]);
        } else
            return view('User.contactUs', [
                'title' => 'Hi',
                'login' => 'login',
            ]);
    }

    public function aboutUs()
    {
        if (Session::has('Suser_name')) {
            $cartactive = DB::table('cart')
                ->select('*')
                ->join('product', 'cart.id', '=', 'product.id')
                ->where('cart.user_name', Session::get('Suser_name'))
                ->get();
            Session::put('Scartactive', $cartactive);
            return view('User.aboutUs', [
                'title' => 'Hi ' . Session::get('Suser_name'),
                'login' => 'myaccount',
            ]);
        } else
            return view('User.aboutUs', [
                'title' => 'Hi',
                'login' => 'login',
            ]);
    }

    //End mam

}
