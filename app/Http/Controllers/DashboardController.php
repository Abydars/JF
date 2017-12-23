<?php

namespace App\Http\Controllers;

use App\Facades\FormatFacade;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Dashboard;

class DashboardController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//Dashboard::setTitle( 'Dashboard' );

		return view( 'dashboard.dashboard' );
	}
}
