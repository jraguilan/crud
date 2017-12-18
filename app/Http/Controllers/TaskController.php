<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers;
use Carbon\Carbon;

class TaskController extends Controller
{
  
  

	public function insert(Request $request){

		$current_time = Carbon::now('Asia/Manila')->toDateTimeString();
		//$date = Carbon::createFromFormat('Y-m-d H:i:s', $current_time);

		$purchase = $request->input('selectpurchase');
		$amount = $request->input('amount');
		$operator = $request->input('selectoperator');
		
		DB::insert('insert into transaction (purchase, created_at, amount, operator) values(?,?,?,?)',[$purchase,$current_time,$amount,$operator]);
//GAWA BAGONG PAGE YUNG MAAYOS NA RETURN..
		//echo "Record inserted successfully.<br/>";
		//echo '<a href="/home">Click Here</a> to go back.';
		return redirect('homeCRUD');
}
	public function index1(){
		$users2 = DB::table('transaction')->paginate(10);
		return view('home_crud',['users2'=>$users2]);
}	
public function show($id)
{
		$users2 = DB::select('select * from transaction where id = ?',[$id]);
		return view('update_purchase',['users2'=>$users2]);

}
	public function edit(Request $request,$id)
{
		$current_time = Carbon::now('Asia/Manila')->toDateTimeString();
		//$users2 = DB::select('select * from transaction where id = ?',[$id]);
		$purchase2 = $request->input('purchase2');
		$amount2 = $request->input('amount2');
		$operator2 = $request->input('operator2');
		$remarks = $request->input('remarks');

		DB::update('update transaction set purchase = ?, amount = ?, operator = ?, updated_at = ?, remarks = ? where id = ?',[$purchase2,$amount2,$operator2,$current_time,$remarks,$id]);

		return redirect('homeCRUD');
		//echo "	.<br/>";
		//echo '<a href="/home">Click Here</a> to go back.';
}
	public function destroy($id)
{
		DB::delete('delete from transaction where id = ?',[$id]);
		return redirect('homeCRUD');
		//echo "Record deleted successfully.<br/>";
		//echo '<a href="/home">Click Here</a> to go back.';
}
public function select($id)
{
		DB::select('select from transaction where id = ?',[$id]);
		//echo "Record deleted successfully.<br/>";
		//echo '<a href="/home">Click Here</a> to go back.';
}

}