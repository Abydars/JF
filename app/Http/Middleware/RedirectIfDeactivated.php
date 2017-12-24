<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectIfDeactivated
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next )
	{
		$user = Auth::user();

		switch ( $user->status ) {
			case 'inactive':
				return response()->redirectToRoute('activate.index');
			case 'suspended':
				return response()->redirectToRoute('activate.index');
		}

		return $next( $request );
	}
}
