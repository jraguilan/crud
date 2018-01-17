<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Excel;
class ExportController extends Controller
{

  //    public function import(Request $request)
  //   {
  //     if($request->file('imported-file'))
  //     {
  //               $path = $request->file('imported-file')->getRealPath();
  //               $data = Excel::load($path, function($reader) {
  //           })->get();
  //           if(!empty($data) && $data->count())
  //     {
  //       $data = $data->toArray();
  //       for($i=0;$i<count($data);$i++)
  //       {
  //         $dataImported[] = $data[$i];
  //       }
  //           }
  //     Transaction::insert($dataImported);
  //       }
  //       return back();
  // }
  /**
     * export a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function exportasexcel(){

      $users2 = Transaction::all();
      Excel::create('transaction', function($excel) use($users2) {
          $excel->sheet('ExportFile', function($sheet) use($users2) {
              $sheet->fromArray($users2);
          });
      })->export('xls');
    }
}
