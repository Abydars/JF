<?php

namespace App\Http\Middleware;

use App\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsSubscriber
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next )
	{
		$user = Auth::user();

		if ( $user && $user->role_id == UserRole::getDefaultUserRole()->id ) {
			return $next( $request );
		}

		return response()->redirectToRoute( 'dash' );
	}
}
