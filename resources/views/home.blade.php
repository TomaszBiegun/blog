@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{route('post.index')}}" class="btn btn-success">List of Posts</a>
                        <a class="btn btn-success" href="{{route('post.create')}}">{{trans('post::post.create')}}</a>

                        {{ Form::model($user, ['route' => ['user.modifyAdmin', $user->id], 'method' => 'PUT']) }}
                        {{ Form::hidden('role',$user->role) }}

                        @if($user->role == \App\User::ROLE_USER)
                            {{ Form::submit(trans('user.set-admin'), ['class' => 'btn btn-primary']) }}
                        @else
                            {{ Form::submit(trans('user.unset-admin'), ['class' => 'btn btn-danger']) }}
                        @endif


                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
