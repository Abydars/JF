<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create( 'users', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'avatar' )->default( '/img/avatar.svg' );
			$table->string( 'first_name' )->default( '' );
			$table->string( 'last_name' )->default( '' );
			$table->string( 'email' )->unique();
			$table->string( 'username' )->unique();
			$table->string( 'password' );
			$table->string( 'api_token', 60 )->unique()->nullable();
			$table->enum( 'status', [ 'inactive', 'active', 'suspended' ] )->default( 'inactive' );
			$table->string( 'phone' )->nullable();
			$table->string( 'country' )->nullable();
			$table->string( 'city' )->nullable();
			$table->string( 'state' )->nullable();
			$table->integer( 'role_id' )->unsigned()->default( \App\UserRole::getDefaultUserRole()->id );
			$table->longText( 'meta_data' )->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign( 'role_id' )->references( 'id' )->on( 'user_roles' )->onDelete( 'cascade' );
		} );

		DB::table( 'users' )->insert(
			array(
				array(
					'id'             => 1,
					'first_name'     => 'Abid',
					'last_name'      => 'Raza',
					'email'          => 'abidr.w@gmail.com',
					'username'       => 'abiidars',
					'password'       => bcrypt( 'abiidars!' ),
					'api_token'      => null,
					'status'         => \App\User::STATUS_ACTIVE,
					'role_id'        => \App\UserRole::getAdminRole()->id,
					'remember_token' => 'o8fAByWQ9oXcg90HHcuRrZoTgsC2MfAX58jd7mnLzALIVPghyDzrxNOsNW9P',
					'created_at'     => Carbon::now()->toDateTimeString(),
					'updated_at'     => Carbon::now()->toDateTimeString(),
				)
			)
		);
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::disableForeignKeyConstraints();
		Schema::dropIfExists( 'users' );
	}
}
