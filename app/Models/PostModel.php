<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class PostModel extends Model
{
    use HasFactory;
    use Commentable;
    protected $table = 'Posts';
    public $incrementing = false;
    // public $timestamps = false;

    public function InCommunity(){
        return $this->belongsTo(CommunitiesModel::class, 'CommunityId', 'CommunityId');
    }

    public function PostedBy(){
        return $this->belongsTo(UserModel::class, 'UserId', 'id');
    }

    public function UpvotedBy(){
        return $this->hasMany(UserUpvotesModel::class, 'CommunityId', 'CommunityId');
    }

    public function SavedByUsers(){
        return $this->hasMany(SavedPostsModel::class, 'post_id', 'id');
    }
}
