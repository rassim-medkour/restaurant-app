<?php

namespace App;

use App\Notifications\AdminResetPasswordControllerNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';



    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'admin_id', 'role_id');
    }

    public function hasAnyRoles($roles)
    {

        /* if (is_array($roles)) {
        foreach ($roles as $role) {
        if ($this->hasRole($role)) {
        return true;
        }
        }
        } else {
        if ($this->hasRole($roles)) {
        return true;
        }
        }
        return false; */
        
        return null !== $this->roles->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        dd($role);
        return null !== $this->roles->where('name', $role)->first();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'adress', 'job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordControllerNotification($token));
    }
}
