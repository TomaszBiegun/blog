{{ Html::ul($errors->all()) }}


{{ Form::open(['url' => route('comment.store')]) }}
{{ Form::hidden('user_id',auth()->user()->id) }}
{{ Form::hidden('post_id',$post->getId()) }}


<div class="form-group">
    {{ Form::label('content', trans('post::comment.headers.content')) }}
    {{ Form::textarea('content',null ,['class' => 'form-control']) }}
</div>

{{ Form::submit(trans('post::comment.save'), ['class' => 'btn btn-success']) }}

{{ Form::close() }}
