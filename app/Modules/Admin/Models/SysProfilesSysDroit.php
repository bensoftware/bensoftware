<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SysProfilesSysDroit extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	 
	/*protected $table = 'sys_profiles_sys_droits';
	protected $fillable = [
        'sys_droits_id',
        'sys_profiles_id'
    ];*/

	public function b_droits_acces()
	{
		return $this->belongsTo(SysDroit::class, 'sys_droit_id');
	}

	public function sys_profiles()
	{
		return $this->belongsTo(SysProfile::class, 'sys_profile_id');
	}
}