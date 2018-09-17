@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{trans('post::post.show',['id'=>$post->getId()])}}
                        <span>
                             <a class="btn btn-danger btn-sm"
                                href="{{route('post.index')}}">{{trans('post::post.back')}}</a>
                    </span>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p>{{trans('post::post.headers.id')}}</p>
                            </div>
                            <div class="col-sm-7">
                                <p>{{$post->getId()}}</p>
                            </div>

                            <div class="col-sm-3">
                                <p>{{trans('user.fullname')}}</p>
                            </div>
                            <div class="col-sm-7">
                                <p>{{$post->user->getFullname()}}</p>
                            </div>


                            <div class="col-sm-3">
                                <p>{{trans('post::post.headers.content')}}</p>
                            </div>
                            <div class="col-sm-7">
                                <p>{{$post->getContent()}}</p>
                            </div>

                            <div class="col-sm-3">
                                <p>{{trans('post::post.headers.created-date')}}</p>
                            </div>
                            <div class="col-sm-7">
                                <p>{{$post->getCreatedAt()->format('Y-m-d H:i')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection