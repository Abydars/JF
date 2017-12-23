<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
	public function home()
	{
		$user = Auth::user();

		return view( 'home', [
			'is_user_logged_in' => ! empty( $user )
		] );
	}
}
