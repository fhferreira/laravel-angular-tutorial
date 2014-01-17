<?php

use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function ($table) {
	      $table->increments('id');
	      $table->string('name');
	      $table->float('amount');
	      $table->integer('customer_id');
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
		 Schema::drop('transactions');
	}

}