<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SysDroit extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'sys_droits';
	 

	public function sys_groupes_traitement()
	{
		return $this->belongsTo(SysGroupesTraitement::class, 'sys_groupes_traitement_id');
	}
}
