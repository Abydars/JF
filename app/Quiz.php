<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	public $timestamps = false;

	protected $table = 'quizzes';

	protected $fillable = [
		'name',
		'start_dt',
		'end_dt',
		'status',
		'meta_data'
	];

	public function setMetaDataAttribute( $value )
	{
		if ( $value ) {
			$this->meta_data = json_encode( $value );
		} else {
			$this->meta_data = json_encode( [] );
		}
	}

	public function getMetaDataAttribute()
	{
		if ( $this->attributes['meta_data'] ) {
			$this->attributes['meta_data'] = json_decode( $this->attributes['meta_data'], true );
		}

		return $this->attributes['meta_data'];
	}

	public function setMetaData( $key, $value )
	{
		if ( $this->attributes['meta_data'] ) {
			$this->attributes['meta_data'] = json_decode( $this->attributes['meta_data'], true );
		}

		$this->attributes['meta_data'][ $key ] = $value;
		$this->setMetaDataAttribute( $this->meta_data );
	}

	public function getMetaData( $key )
	{
		if ( $this->meta_data ) {
			$this->meta_data = json_decode( $this->meta_data, true );
		}

		return isset( $this->meta_data[ $key ] ) ? $this->meta_data[ $key ] : false;
	}

	public function references()
	{
		$this->hasMany( 'App\QuizReference', 'quiz_id', 'id' );
	}
}
