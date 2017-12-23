<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	protected $table = 'user_roles';

	public static function getDefaultUserRole()
	{
		return UserRole::where( 'name', 'subscriber' )->first();
	}

	public static function getContributorUserRole()
	{
		return UserRole::where( 'name', 'contributor' )->first();
	}

	public static function getAdminRole()
	{
		return UserRole::where( 'name', 'administrator' )->first();
	}
}
