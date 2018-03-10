<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'quizzes', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->dateTime( 'start_dt' );
			$table->dateTime( 'end_dt' );
			$table->string( 'status' )->default( 'inactive' );
			$table->longText( 'meta_data' )->nullable();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( 'quizzes' );
	}
}
