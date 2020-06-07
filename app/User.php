<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'sys_types_user_id' => 'int',
        'etat' => 'int',
        'confim' => 'int'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'remember_token',
        'sys_types_user_id',
        'etat',
        'phone',
        'code',
        'confim'
    ];

    public function sysProfiles()
    {
      return $this->belongsToMany('\App\Modules\Admin\Models\SysProfile','sys_profiles_users','user_id','sys_profile_id');
    }

    public function hasAccessForAgence($groupes, $agence_id = null, $type = 0)
    {
        return $this->hasAccess($groupes, $type, $agence_id);
    }

    public function hasAccess($groupes, $type = 0, $agence_id = null)
    {
        if($type==0)
            $type = [0,1,2,3,4,5];
        else
            $type = (is_array($type)) ? $type : [0,$type];
        $groupes = (is_array($groupes)) ? $groupes : [$groupes];
        $profiles = $this->sysProfiles;
        if ($agence_id) {
            $agences = (is_array($agence_id)) ? $agence_id : [$agence_id];
            $profiles = $profiles->whereIn('id', $this->sys_profiles_users->whereIn('agence_id',$agences)->pluck('sys_profile_id'));
        }
        foreach($profiles as $profile){
            if($profile->sys_droits()->whereIn('sys_groupes_traitement_id',$groupes)->whereIn('type_acces',$type)->exists())
                return true;
        }
        return false;
    }

    public function sys_types_user()
    {
        return $this->belongsTo(\App\Models\SysTypesUser::class);
    }

    public function agents()
    {
        return $this->hasMany(\App\Models\Agent::class);
    }

    public function centre_formations()
    {
        return $this->hasMany(\App\Models\CentreFormation::class);
    }

    public function centre_formation()
    {
        return $this->hasOne(\App\Models\CentreFormation::class);
    }
    public function demendeur_emplois()
    {
        return $this->hasMany(\App\Models\DemendeurEmplois::class);
    }

    public function demendeur_emploi()
    {
        return $this->hasOne(\App\Models\DemendeurEmplois::class);
    }
    public function employeurs()
    {
        return $this->hasMany(\App\Models\Employeur::class);
    }

    public function employeur()
    {
        return $this->hasOne(\App\Models\Employeur::class);
    }
    public function messages()
    {
        return $this->hasMany(\App\Models\Message::class, 'expediteur');
    }

    public function notifications()
    {
        return $this->hasMany(\App\Models\Notification::class);
    }

    public function suivis()
    {
        return $this->hasMany(\App\Models\Suivi::class);
    }

    public function sys_profiles()
    {
        return $this->belongsToMany(\App\Modules\Admin\Models\SysProfile::class, 'sys_profiles_users')
            ->withPivot('id', 'agence_id', 'ordre', 'deleted_at')
            ->withTimestamps();
    }

    public function sys_profiles_users()
    {
        return $this->hasMany(\App\Modules\Admin\Models\SysProfilesUser::class);
    }
}
