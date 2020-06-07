<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Apr 2020 01:48:12 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class SysTypesUser
 *
 * @property int $id
 * @property string $libelle
 * @property string $libelle_ar
 * @property int $ordre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class SysTypesUser extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'ordre' => 'int'
	];

	protected $fillable = [
		'libelle',
		'libelle_ar',
		'ordre'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
