<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

      public $table="transaction";
    //
      public $fillable = [
      	
      	'purchase',
      	'amount',
      	'operator',
      	'actor',
      	'remarks',
      	// 'created_at',
      	// 'updated_at'

      ];
}
