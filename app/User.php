<?php

namespace App;

use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Config;
use \App\Facades\UtilsFacade;
use \App\UserGoal;

class User extends Authenticatable
{
	use Notifiable;

	const STATUS_ACTIVE = 'active';
	const STATUS_INACTIVE = 'inactive';
	const STATUS_SUSPENDED = 'suspended';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'avatar',
		'first_name',
		'last_name',
		'email',
		'username',
		'password',
		'status',
		'phone',
		'country',
		'city',
		'state',
		'role_id',
		'meta_data'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $appends = [
		'is_admin',
		'is_subscriber',
		'is_contributor'
	];

	public function getMetaDataAttribute( $value )
	{
		if ( ! empty( $value ) ) {
			return json_decode( $value, true );
		}

		return [];
	}

	public function setMetaDataAttribute( $value )
	{
		$this->attributes['meta_data'] = json_encode( $value );
	}

	public function getIsAdminAttribute()
	{
		return $this->role_id == UserRole::getAdminRole()->id;
	}

	public function getIsSubscriberAttribute()
	{
		return $this->role_id == UserRole::getDefaultUserRole()->id;
	}

	public function getIsContributorAttribute()
	{
		return $this->role_id == UserRole::getContributorUserRole()->id;
	}

	public function role()
	{
		return $this->belongsTo( 'App\UserRole', 'role_id' );
	}

	/**
	 * The channels the user receives notification broadcasts on.
	 *
	 * @return string
	 */
	public function receivesBroadcastNotificationsOn()
	{
		return 'user.' . $this->id;
	}

	public static function getUserRole( $id )
	{
		return User::with( 'role' )->find( $id )->role;
	}
}