<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SysProfilesUser extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	
	protected $table = 'sys_profiles_users';

	public function user()
	{
		return $this->belongsTo(SysDroit::class, 'user_id');
	}

	public function sys_profile()
	{
		return $this->belongsTo(SysProfile::class, 'sys_profile_id');
	}

	public function agence()
	{
		return $this->belongsTo(\App\Models\Agence::class, 'agence_id');
	}
}