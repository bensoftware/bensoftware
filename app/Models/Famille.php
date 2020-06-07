<?php

/**
 * Created by Illuminate Model.
 * Date: Thu, 02 Apr 2020 11:54:33 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Famille
 *
 * @property int $id
 * @property string $libelle
 * @property int $has_articles
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @package App\Models
 */
class Famille extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'has_articles' => 'int'
	];

	protected $fillable = [
		'libelle',
		'has_articles'
	];
}
