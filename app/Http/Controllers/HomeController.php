<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


        private $user_id;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users2 = DB::table('transaction')->get();
        return view('home',['users2'=>$users2]);
    }
 public function createuser()
    {
       
        return view('auth.register');
    }


    public function insert(Request $request){
///$value = session('name');
        $actor = $request -> user()->username;
      
        $current_time = Carbon::now('Asia/Manila')->toDateTimeString();
        //$date = Carbon::createFromFormat('Y-m-d H:i:s', $current_time);
//$user3 = session('',)
        $purchase = $request->input('selectpurchase');
        $amount = $request->input('amount');
        $operator = $request->input('selectoperator');
        
        DB::insert('insert into transaction (purchase, created_at, amount, operator, actor) values(?,?,?,?,?)',[$purchase,$current_time,$amount,$operator,$actor]);
//GAWA BAGONG PAGE YUNG MAAYOS NA RETURN..
        //echo "Record inserted successfully.<br/>";
        //echo '<a href="/home">Click Here</a> to go back.';
        return redirect('home');
}
    public function index1(){
        
}   
public function show($id)
{
   // dd($id);
        $users2 = DB::select('select * from transaction where id = ?',[$id]);
        return view('update_purchase',['users2'=>$users2]);

}
    public function edit(Request $request,$id)
{
        $actor = $request -> user()->username;
        $current_time = Carbon::now('Asia/Manila')->toDateTimeString();
        //$users2 = DB::select('select * from transaction where id = ?',[$id]);
        $purchase2 = $request->input('purchase2');
        $amount2 = $request->input('amount2');
        $operator2 = $request->input('operator2');
        $remarks = $request->input('remarks');

        DB::update('update transaction set purchase = ?, amount = ?, operator = ?, updated_at = ?, remarks = ?, actor = ? where id = ?',[$purchase2,$amount2,$operator2,$current_time,$remarks,$actor,$id]);

        return redirect('home');
        //echo "    .<br/>";
        //echo '<a href="/home">Click Here</a> to go back.';
}

    public function destroy(Request $request, $id)
{  
     //   select
          //  dd($this->user_id);
        DB::delete('delete from transaction where id = ?',[$id]);    
        return redirect('home');
        //  $request->session()->flush();
        //echo "Record deleted successfully.<br/>";
        //echo '<a href="/home">Click Here</a> to go back.';
}
// public function select(Request $request,$id)
// { //dd($id);
//         //DB::select('select from transaction where id = ?',[$id]);
//         $this->user_id=$id;
//         dd($this->user_id);
//         $request->session()->put('user_id',$this->user_id);
//          //return redirectback();
//         //return $this->user_id;
//         //dd($this->user_id);
//          //return redirect('home');
//         //echo "Record deleted successfully.<br/>";
//         //echo '<a href="/home">Click Here</a> to go back.';
// }

// public function searchdate(Request $request)
// {


//        $datefrom = $request->input('datetimepicker1');
//          $dateto = $request->input('datetimepicker2');
//          $datefrom = $datefrom.  " 00:00:00";
//           $dateto = $dateto.  " 23:59:59";

//           // dd($datefrom);
//          $request->session('datefrom',$datefrom);
//            $request->session('dateto',$dateto);

//         $users2 = DB::table('transaction')->whereBetween('created_at', [$datefrom,$dateto])
//        ->get();
//        //  $users2 = DB::select('select * from transaction where created_at between ? and ?',[$datefrom,$dateto]);
           
//       // $users2->appends(['search' => $datefrom]);
//         return view('home',['users2'=>$users2]);

//          // $users2->withPath('custom/url');


// }

}
