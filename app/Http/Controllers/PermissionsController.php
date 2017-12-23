<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dashboard;

class PermissionsController extends Controller
{
	public function denied()
	{
		Dashboard::setTitle('Permission Denied');

		return view( 'permission.denied' );
	}
}
