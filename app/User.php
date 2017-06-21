<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Webhook integration for slack.
     *
     * @return mixed
     */
    public function routeNotificationForSlack() {
        return 'https://hooks.slack.com/services/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';
    }
}
