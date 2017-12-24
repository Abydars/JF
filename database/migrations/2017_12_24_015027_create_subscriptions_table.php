<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'subscribers', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'email' );
			$table->dateTime( 'datetime' )->default( DB::raw( 'CURRENT_TIMESTAMP' ) );
			$table->boolean( 'activated' )->default( true );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( 'subscriptions' );
	}
}
