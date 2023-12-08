<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunitiesModel extends Model
{
    use HasFactory;

    protected $table = 'Communities';
    protected $primaryKey = 'CommunityId';
    public $incrementing = false;
    public $timestamps = false;

    public function FollowedBy(){
        return $this->hasMany(FollowedCommunityModel::class, 'CommunityId', 'CommunityId');
    }
}
