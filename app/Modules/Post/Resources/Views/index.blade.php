@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{trans('post::post.header')}}
                        <span>
                          <a class="btn btn-success btn-sm"
                             href="{{route('post.create')}}">{{trans('post::post.create')}}</a>
                             <a class="btn btn-danger btn-sm"
                                href="{{route('home')}}">{{trans('post::post.back')}}</a>
                    </span>
                    </div>

                    <div class="card-body">
                        {{ $posts->links() }}

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{trans('post::post.headers.id')}}</th>
                                    <th>{{trans('user.name')}}</th>
                                    <th>{{trans('user.surname')}}</th>
                                    <th>{{trans('post::post.headers.content')}}</th>
                                    <th>{{trans('post::post.headers.created-date')}}</th>
                                    <th>{{trans('post::post.headers.like')}}</th>
                                    <th>{{trans('post::post.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->getId()}}</td>
                                        <td>{{$post->user->getName()}}</td>
                                        <td>{{$post->user->getSurname()}}</td>
                                        <td>{{substr($post->getContent(),0,20).'...'}}</td>
                                        <td>{{$post->getCreatedAt()->format('Y-m-d H:i')}}</td>
                                        <td>
                                            @php($like = $post->like())

                                            @if($like instanceof \App\Modules\Post\Models\Like)
                                                {{ Form::model($like, ['route' => ['like.destroy', $like->getId()], 'method' => 'DELETE']) }}
                                                {{ Form::submit(trans('post::post.unlike'), ['class' => 'btn btn-danger btn-sm']) }}

                                            @else
                                                {{ Form::open(['url' => route('like.store')]) }}
                                                {{ Form::hidden('post_id',$post->getId()) }}


                                                {{ Form::submit(trans('post::post.like'), ['class' => 'btn btn-success btn-sm']) }}


                                            @endif
                                            {{ Form::close() }}

                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-info"
                                                   href="{{route('post.show', ['id' => $post->getId()])}}">{{trans('post::post.view')}}</a>
                                                <a class="btn btn-warning"
                                                   href="{{route('post.edit', ['id' => $post->getId()])}}">{{trans('post::post.edit')}}</a>


                                                @if(auth()->user() != null && auth()->user()->isAdmin())
                                                    {{ Form::model($post, ['route' => ['post.destroy', $post->getId()], 'method' => 'DELETE']) }}
                                                    {{ Form::submit(trans('post::post.delete'), ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
                                                @endif

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        {{ $posts->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection