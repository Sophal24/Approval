<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Approval\Traits\ApprovesChanges;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use ApprovesChanges;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function authorizedToApprove(\Approval\Models\Modification $mod) : bool
    {
        // Return true to authorize approval, false to deny
        return true;
    }

    protected function authorizedToDisapprove(\Approval\Models\Modification $mod) : bool
    {
        // Return true to authorize disapproval, false to deny
        return true;
    }
}
