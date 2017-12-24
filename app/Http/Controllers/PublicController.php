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

	public function dashboard()
	{
		$user = Auth::user();

		if ( $user && $user->is_admin ) {
			return response()->redirectToRoute( 'dashboard.admin' );
		}

		return response()->redirectToRoute( 'dashboard.user' );
	}

	public function page( $slug, Request $request )
	{
		$data = [];
		$view = 'public.' . $slug;

		if ( view()->exists( $view ) ) {

			if ( $request->isMethod( 'POST' ) ) {
				$data = $this->handlePageRequest( $request );
			}

			return view( $view, $data );
		}

		return response()->view( 'public.not_found', [ 'status' => 404 ] );
	}

	private function handlePageRequest( Request $request )
	{
		if ( $request->has( 'pg_action' ) ) {
			switch ( $request->input( 'pg_action' ) ) {
				case 'contribute':

					break;
			}
		}
		return [];
	}
}
