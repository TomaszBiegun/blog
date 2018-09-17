<?php

namespace App\Modules\Post\Http\Controllers;

use App\Modules\Post\Http\Requests\PostRequest;
use App\Modules\Post\Models\Post;
use App\Modules\Post\Services\PostService;

use App\Http\Controllers\Controller;

/**
 * Class PostController
 * @package App\Modules\Post\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var PostService|null
     */
    private $postService = null;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->postService = new PostService();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('post::index', [
            'posts' => $this->postService->getAll()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->postService->getById($id);

        if (!$post instanceof Post) {
            return redirect()->route('post.index')->with('error', trans('post::alerts.error.post', ['id' => $id]));
        }

        return view('post::view', [
            'post' => $post
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('post::create');
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {

        try {
            $this->postService->store($request);

            return redirect()->route('post.index')->with('success', trans('post::alerts.success.store'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('post::alerts.error.store'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->postService->getById($id);

        if (!$post instanceof Post) {
            return redirect()->route('post.index')->with('error', trans('post::alerts.error.post', ['id' => $id]));
        }

        return view('post::edit', [
            'post' => $post
        ]);
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        try {
            $this->postService->store($request, $id);

            return redirect()->route('post.index')->with('success', trans('post::alerts.success.update'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('post::alerts.error.update'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->postService->delete($id);

            return redirect()->route('post.index')->with('success', trans('post::alerts.success.delete'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('post::alerts.error.delete'));
        }
    }
}
