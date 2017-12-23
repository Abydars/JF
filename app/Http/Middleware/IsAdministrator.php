<?php

namespace App\Http\Middleware;

use App\User;
use App\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdministrator
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 *
	 * @param null $guard
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next )
	{
		$user = Auth::user();

		if ( $user && $user->role_id == UserRole::getAdminRole()->id ) {
			return $next( $request );
		}

		return response()->redirectToRoute( 'dash' );
	}
}
