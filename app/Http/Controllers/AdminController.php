<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware( [ 'auth', 'administrator' ] );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = Auth::user();

		$total_users = User::all()->count();

		return view( 'dashboard.admin_dashboard', [
			'user'        => $user,
			'total_users' => $total_users
		] );
	}
}
