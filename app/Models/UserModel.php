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

    protected $table = 'Users';
    protected $username = 'username';
    public $incrementing = false;
    public $timestamps = false;

    public function FollowedCommunity(){
        return $this->hasMany(FollowedCommunityModel::class, 'Id', 'Id');
    }

    public function Posted(){
        return $this->hasMany(PostModel::class, 'id', 'UserId');
    }

    public function Upvotes(){
        return $this->hasMany(UserUpvotesModel::class, 'Id', 'Id');
    }
}
