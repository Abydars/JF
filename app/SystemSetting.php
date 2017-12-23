<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
	const TYPE_ARRAY = 'array';
	const TYPE_STRING = 'string';

	protected $table = 'system_settings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'value'
	];

	public $timestamps = false;

	public static function get( $name, $type = self::TYPE_STRING )
	{
		$value   = false;
		$setting = SystemSetting::where( 'name', $name )->first();

		if ( $setting ) {
			$value = $setting->value;

			if ( $type == self::TYPE_ARRAY ) {
				$value = json_decode( $value, true );
			}
		}

		return $value;
	}

	public static function set( $name, $value )
	{
		if ( is_array( $value ) ) {
			$value = json_encode( $value );
		}

		$setting        = SystemSetting::firstOrCreate( [
			                                                'name' => $name
		                                                ], [
			                                                'value' => $value
		                                                ] );
		$setting->value = $value;

		return $setting->save();
	}
}
