@if(isset($model) and $model->{$name}->url('thumb'))
	<div class="row">
        <div class="col-sm-3">
            <img src="{{ $model->{$name}->url('thumb') }}" alt="" width="100" height="100">
        </div>
        <div class="col-sm-9">
            <div class="form-group @if ($errors->has($name)) has-error @endif">
                {{ Form::label($name, Str::title($name).' :', ['class'=>'control-label']) }}
                {{ Form::file($name, ['class'=>'form-control']) }}
                @if ($errors->has($name)) <p class="help-block">{{ $errors->first($name) }}</p> @endif
            </div>
        </div>
    </div>
@else
    <div class="form-group @if ($errors->has($name)) has-error @endif">
        {{ Form::label($name, Str::title($name).' :', ['class'=>'control-label']) }}
        {{ Form::file($name, ['class'=>'form-control']) }}
        @if ($errors->has($name)) <p class="help-block">{{ $errors->first($name) }}</p> @endif
    </div>
@endif