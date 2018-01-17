P<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('purchase');
         //   $table->string('date_purchase')->timestamps();
            $table->decimal('amount', 8, 2);
            $table->string('operator');
            $table->string('actor')->nullable($value = true);
           $table->text('remarks')->nullable($value = true);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('transaction');
    }
}
