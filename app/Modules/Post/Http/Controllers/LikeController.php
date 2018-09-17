<?php

namespace App\Modules\Post\Http\Controllers;

use App\Modules\Post\Http\Requests\LikeRequest;
use App\Modules\Post\Services\LikeService;
use App\Http\Controllers\Controller;

/**
 * Class LikeController
 * @package App\Modules\Post\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * @var LikeService|null
     */
    private $likeService = null;

    /**
     * LikeController constructor.
     */
    public function __construct()
    {
        $this->likeService = new LikeService();
    }

    /**
     * @param LikeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LikeRequest $request)
    {

        try {
            $this->likeService->store($request);

            return redirect()->route('post.index')->with('success', trans('post::alerts.success.like'));
        } catch (\Exception $e) {

            return redirect()->back()->with('error', trans('post::alerts.error.like'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->likeService->delete($id);

            return redirect()->route('post.index')->with('success', trans('post::alerts.success.unlike'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('post::alerts.error.unlike'));
        }
    }
}
