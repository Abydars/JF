<?php

namespace App\Http\Controllers;

use App\SystemSetting;
use Illuminate\Http\Request;

class SettingsController extends PanelController
{
	public function __construct()
	{
		$this->middleware( 'administrator' );
		$this->title = 'Settings';
	}

	public function index( Request $request )
	{
		$error = $success = false;

		$exclude     = [ '_token' ];
		$check_boxes = [ 'is_quiz_open', 'is_pre_registration_open' ];
		$radios      = [];

		if ( $request->isMethod( 'POST' ) ) {
			foreach ( $request->all() as $key => $value ) {
				if ( ! in_array( $key, $exclude ) ) {
					SystemSetting::set( $key, $value );
				}
			}

			foreach ( $check_boxes as $cb ) {
				if ( ! $request->has( $cb ) ) {
					SystemSetting::set( $cb, '0' );
				}
			}

			foreach ( $radios as $radio ) {
				if ( ! $request->has( $radio ) ) {
					SystemSetting::set( $radio, '0' );
				}
			}

			$success = 'Settings successfully updated.';
		}

		return view( 'settings.index', [
			'error'   => $error,
			'success' => $success
		] );
	}
}
