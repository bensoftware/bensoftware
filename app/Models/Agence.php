<?php

/**
 * Created by Illuminate Model.
 * Date: Thu, 02 Apr 2020 11:54:33 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Agence
 *
 * @property int $id
 * @property string $libelle
 * @property string $libelle_ar
 * @property string $adresse
 * @property string $contact
 * @property string $telephone
 * @property string $email
 * @property int $ref_commune_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @property \App\Models\RefCommune $ref_commune
 * @property \Illuminate\Database\Eloquent\Collection $agents
 * @property \Illuminate\Database\Eloquent\Collection $employeurs
 * @property \Illuminate\Database\Eloquent\Collection $offres
 *
 * @package App\Models
 */
class Agence extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'ref_commune_id' => 'int'
	];

	protected $fillable = [
		'libelle',
		'libelle_ar',
		'adresse',
		'contact',
		'telephone',
		'email',
		'ref_commune_id'
	];

	public function ref_commune()
	{
		return $this->belongsTo(\App\Models\RefCommune::class);
	}

	public function agents()
	{
		return $this->hasMany(\App\Models\Agent::class);
	}

	public function employeurs()
	{
		return $this->hasMany(\App\Models\Employeur::class);
	}

	public function offres()
	{
		return $this->hasMany(\App\Models\Offre::class);
	}
}
