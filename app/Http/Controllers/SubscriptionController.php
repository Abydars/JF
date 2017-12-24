<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Validator;
use Datatables;

class SubscriptionController extends Controller
{
	public function subscribe( Request $request )
	{
		$validator = Validator::make( $request->all(),
		                              [
			                              'email' => 'required|email|unique:subscribers,email',
		                              ],
		                              [
			                              'email.unique' => 'You are already subscribed.<br/>Thank you!'
		                              ] );

		if ( $validator->fails() ) {
			$error = $validator->errors()->first();
		} else {
			$subscriber = Subscriber::create( [
				                                  'email' => $request->input( 'email' )
			                                  ] );
			if ( $subscriber->id > 0 ) {
				return response()->json( [
					                         'status'  => true,
					                         'message' => 'You\'re now subscribed to Jaffery Forum.<br/>Thank you!'
				                         ] );
			} else {
				$error = 'Failed to subscribe';
			}
		}

		return response()->json( [
			                         'status'  => false,
			                         'message' => $error
		                         ] );
	}

	public function index()
	{
		return view( 'subscriber.index' );
	}

	public function data()
	{
		return Datatables::of( Subscriber::all() )->make( true );
	}
}
