<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedPostsModel extends Model
{
    use HasFactory;

    protected $table = 'savedPosts';
    public $timestamps = false;

    public function User(){
        return $this->belongsTo(UserModel::class, 'id', 'UserId');
    }

    public function Posts(){
        return $this->belongsTo(PostModel::class, 'post_id', 'id');
    }
}
