<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUpvotesModel extends Model
{
    use HasFactory;

    protected $table = 'userUpvote';
    public $timestamps = false;

    public function User(){
        return $this->belongsTo(UserModel::class, 'id', 'UserId');
    }

    public function Posts(){
        return $this->belongsTo(PostModel::class, 'id', 'UserId');
    }
}
