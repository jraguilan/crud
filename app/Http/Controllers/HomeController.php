<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use App\Http\Controllers;
use Carbon\Carbon;
use DateTime;
use Session;
//use App\Http\Controllers\Input;
// use Input;




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
       //  console.log('pumas');
        //  if (Auth::guest()) { 
        //     return Redirect::guest('login');
        // } else { 
        $users2 = DB::table('transaction')
        ->orderby('created_at','desc')
        ->get();
        
        return view('home',['users2'=>$users2]);
        
    }
 public function createuser()
    {
       
        return view('register');
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
        session ( [ 
            
            'date1' => $request->get ( 'datetimepicker1' ) 
        ] );
         Session::flash ( 'message', "Added successfully." );
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
          Session::flash ( 'message', "Updated successfully." );
        return redirect('home');
        //echo "    .<br/>";
        //echo '<a href="/home">Click Here</a> to go back.';
}

    public function destroy(Request $request, $id)
{  
     //   select
          //  dd($this->user_id);
        DB::delete('delete from transaction where id = ?',[$id]);
             Session::flash ( 'message', "Deleted successfully." );
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


private function super()
    {
       //  console.log('pumas');
        //  if (Auth::guest()) { 
        //     return Redirect::guest('login');
        // } else { 
        $users2 = DB::table('users')->get();
        if (count($users2) > 1) {
            return redirect(\URL::previous());
        }
        else {
            $rules = array (
                 'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
        );
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ()) {
            return Redirect::back ()->withErrors ( $validator)->withInput ();
        } else {
            $user = new User ();
            $user->name = $request->get ( 'name' );
            $user->email = $request->get ( 'email' );
            $user->username = $request->get ( 'username' );
            $user->password = Hash::make ( $request->get ( 'password' ) );
            $user->remember_token = $request->get ( '_token' );
            
            $user->save ();
             
         return redirect(\URL::previous());
        }
            //return view('CREATEONLY');
        }
        //return view('home',['users2'=>$users2]);
        
    }
    /*Export Data*/
// public function export(Request $request){       
//     $transact=DB::table('transaction')->get();
//     $tot_record_found=0;
//     if(count($transact)>0){
//         $tot_record_found=1;
         
//         $CsvData=array('ID,Purchase,Amount,Operator,User,Remarks,Created At,Updated At');          
//         foreach($transact as $value){              
//             $CsvData[]=$value->id.','.$value->purchase.','.$value->amount.','.$value->operator.','.$value->actor.','.$value->remarks.','.$value->created_at.','.$value->updated_at;
//         }
         
//         $filename=date('Y-m-d').".csv";
//         $file_path=base_path().'/'.$filename;   
//         $file = fopen($file_path,"w+");
//         foreach ($CsvData as $exp_data){
//           fputcsv($file,explode(',',$exp_data));
//         }   
//         fclose($file);          
 
//         $headers = ['Content-Type' => 'application/csv'];
//         return response()->download($file_path,$filename,$headers );
//     }
//     return view('download',['record_found' =>$tot_record_found]);    
// }
public function exportascsv(Request $request){  


      $datefrom1 = $request->input('datetimepicker1');
      $dateto1 = $request->input('datetimepicker2');
      $datefrom = $datefrom1.  " 00:00:00";
      $dateto = $dateto1.  " 23:59:59";
      $searchbar = $request->input('SearchBar');


       //    dd($searchbar);
         // $request->session('datefrom',$datefrom);
         //   $request->session('dateto',$dateto);
       //  $users2 = DB::select('select * from transaction where created_at between ? and ?',[$datefrom,$dateto]);

  
    if (  $datefrom1 =="" &&  $dateto1 =="") {
      if ($searchbar == "") {
         $transact=DB::table('transaction')
        ->orderby('created_at','desc')
        ->get();

      }
      else {
        $transact=DB::table('transaction')
        ->Where(function ($query) {
                $query->orwhere('purchase', 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere('operator', 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere('actor', 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere('remarks', 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere(DB::raw('cast(id as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere(DB::raw('cast(amount as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere(DB::raw('cast(created_at as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');  
                 $query->orwhere(DB::raw('cast(updated_at as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');          
            })
        ->orderby('created_at','desc')
        ->get();
      }
    }
    elseif (  $datefrom1 =="" || $dateto1 ==""){
            Session::flash ( 'error', "Date ranges incomplete. Please try again." );
            return redirect(\URL::previous());

    }
    elseif ( $datefrom1 <>"" && $dateto1 <>"" && $searchbar <>"") {
        $transact=DB::table('transaction')
        ->whereBetween('created_at', [$datefrom,$dateto])
        ->Where(function ($query) {
                $query->orwhere('purchase', 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere('operator', 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere('actor', 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere('remarks', 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere(DB::raw('cast(id as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere(DB::raw('cast(amount as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');
                 $query->orwhere(DB::raw('cast(created_at as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');  
                 $query->orwhere(DB::raw('cast(updated_at as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');          
            })
        ->orderby('created_at','desc')
        ->get();
        }
    
    else {
      if ($searchbar  <> "")
        $transact=DB::table('transaction')
        ->whereBetween('created_at', [$datefrom,$dateto])
        ->orderby('created_at','desc')
        ->get();
        else {
        $transact=DB::table('transaction')
        ->whereBetween('created_at', [$datefrom,$dateto])
        ->Where(function ($query) {
                $query->orwhere('purchase', 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere('operator', 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere('actor', 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere('remarks', 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere(DB::raw('cast(id as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');  
                $query->orwhere(DB::raw('cast(amount as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');
                $query->orwhere(DB::raw('cast(created_at as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');     
                 $query->orwhere(DB::raw('cast(updated_at as varchar)'), 'ilike',  '%' . Input::get('SearchBar') . '%');          
            })
        ->orderby('created_at','desc')
        ->get();
        }
    }

        $tot_record_found=0;
        if(count($transact)>0){
            $tot_record_found=1;
            //First Methos          
            $export_data="ID,Purchase,Amount,Operator,User,Created_At,Updated_At,Remarks\n";
            foreach($transact as $value){
                $export_data.=$value->id.','.$value->purchase.','.$value->amount.','.$value->operator.','.$value->actor.','.$value->created_at.','.$value->updated_at.','.$value->remarks."\n";
            }

            // dd(Input::get('ept')); 
            //dd($export_data);


            $export = $request->CSV;
            if (Input::get('ept') == "c") {
                 return response($export_data)
                ->header('Content-Type','application/csv')               
                ->header('Content-Disposition', 'attachment; filename="purchasing.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0'); 
               
            }
            else {
                return response($export_data)
                ->header('Content-Type','application/xls')               
                ->header('Content-Disposition', 'attachment; filename="purchasing.xls"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');      
            }

        }
        Session::flash ( 'error', "No record found. Please try again." );
        return redirect(\URL::previous());
}


}
