<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'Posts';
    protected $primaryKey = 'PostId';
    public $incrementing = false;
    public $timestamps = false;

    public function InCommunity(){
        return $this->belongsTo(CommunitiesModel::class, 'CommunityId', 'CommunityId');
    }
}
