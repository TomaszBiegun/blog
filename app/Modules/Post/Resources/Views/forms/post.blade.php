{{ Html::ul($errors->all()) }}


@if(isset($post) && $post instanceof \App\Modules\Post\Models\Post)
    {{ Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT']) }}
    {{ Form::hidden('user_id',$post->getUserId()) }}
@else

    {{ Form::open(['url' => route('post.store')]) }}
    {{ Form::hidden('user_id',auth()->user()->id) }}
@endif


<div class="form-group">
    {{ Form::label('content', trans('post::post.headers.content')) }}
    {{ Form::textarea('content',null ,['class' => 'form-control']) }}
</div>

{{ Form::submit(trans('post::post.save'), ['class' => 'btn btn-success']) }}

{{ Form::close() }}
