<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserModel extends Authenticatable implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use HasFactory;

    protected $table = 'User';
    protected $primaryKey = 'UserId';
    public $timestamps = false;
}