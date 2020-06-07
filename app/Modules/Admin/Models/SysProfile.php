<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SysProfile extends Eloquent
{
  use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'sys_profiles';
	 
	public function sys_droits()
	{
		return $this->belongsToMany(SysDroit::class,'sys_profiles_sys_droits','sys_profile_id','sys_droit_id')->whereNull('sys_profiles_sys_droits.deleted_at');
	}

	public function sys_profiles_sys_droits()
	{
		return $this->hasMany(SysProfilesSysDroit::class,'sys_profile_id');
	}
}
