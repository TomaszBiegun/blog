<?php

namespace App\Modules\Post\Services;

use App\Modules\Post\Http\Requests\PostRequest;
use App\Modules\Post\Models\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PostService
 * @package App\Modules\Post\Services
 */
class PostService
{
    /**
     * @param int $limit
     * @return Collection
     */
    public function getAll($limit = 15)
    {
        return Post::paginate($limit);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Post::find((int)$id);
    }

    /**
     * @param PostRequest $request
     * @param null|int $id
     * @return bool
     */
    public function store(PostRequest $request, $id = null)
    {
        $post = new Post();

        if ($id != null) {
            $post = $this->getById($id);
        }

        return $post->setUserId($request->get('user_id'))
            ->setContent($request->get('content'))
            ->save();

    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return Post::destroy($id);
    }
}