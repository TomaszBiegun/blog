<?php

namespace App\Modules\Post\Http\Controllers;

use App\Modules\Post\Http\Requests\CommentRequest;
use App\Modules\Post\Services\CommentService;

use App\Http\Controllers\Controller;

/**
 * Class CommentController
 * @package App\Modules\Post\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @var CommentService|null
     */
    private $commentService = null;

    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {

        try {
            $this->commentService->store($request);

            return redirect()->route('post.show', ['id' => $request->get('post_id')])->with('success', trans('post::alerts.success.comment'));
        } catch (\Exception $e) {

            return redirect()->back()->with('error', trans('post::alerts.error.comment'));
        }
    }
}
