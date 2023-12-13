<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowedCommunityModel extends Model
{
    use HasFactory;

    protected $table = 'FollowedCommunity';
    public $timestamps = false;

    public function User(){
        return $this->belongsTo(UserModel::class, 'Id', 'Id');
    }

    public function Community(){
        return $this->belongsTo(CommunitiesModel::class, 'CommunityId', 'CommunityId');
    }
}
