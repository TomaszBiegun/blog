<?php

namespace App\Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Modules\Post\Models
 */
class Like extends Model
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->user_id = (int)$userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId($postId)
    {
        $this->post_id = (int)$postId;

        return $this;
    }

    public function post()
    {
        $this->belongsTo('App\Modules\Post\Models\Post', 'post_id');
    }

    public function user()
    {
        $this->belongsTo('App\User', 'user_id');
    }
}
