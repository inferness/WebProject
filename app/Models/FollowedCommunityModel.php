<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowedCommunityModel extends Model
{
    use HasFactory;

    protected $table = 'FollowedCommunity';

    public function User(){
        return $this->belongsTo(UserModel::class, 'UserId', 'UserId');
    }

    public function Community(){
        return $this->belongsTo(CommunitiesModel::class, 'CommunityId', 'CommunityId');
    }
}
