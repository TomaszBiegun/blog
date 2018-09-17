<?php

namespace App\Modules\Post\Services;

use App\Modules\Post\Http\Requests\LikeRequest;
use App\Modules\Post\Models\Like;

/**
 * Class LikeService
 * @package App\Modules\Post\Services
 */
class LikeService
{
    /**
     * @param LikeRequest $request
     * @return bool
     */
    public function store(LikeRequest $request)
    {
        $like = new Like();

        return $like->setUserId(auth()->user()->getId())
            ->setPostId($request->get('post_id'))
            ->save();

    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return Like::destroy($id);
    }
}