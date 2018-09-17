<?php

namespace App\Modules\Post\Services;

use App\Modules\Post\Http\Requests\CommentRequest;
use App\Modules\Post\Models\Comment;

/**
 * Class CommentService
 * @package App\Modules\Post\Services
 */
class CommentService
{
    /**
     * @param CommentRequest $request
     * @return bool
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment();

        return $comment->setUserId(auth()->user()->getId())
            ->setPostId($request->get('post_id'))
            ->setContent($request->get('content'))
            ->save();

    }
}