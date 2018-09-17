@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{trans('post::post.create')}}</div>

                    <div class="card-body">

                        @include('post::forms.post')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection